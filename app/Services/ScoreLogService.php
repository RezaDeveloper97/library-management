<?php

namespace App\Services;

use App\Enums\EScoreLogReason;
use App\Handlers\ScoreLogHandler;
use App\DTOs\ScoreLogDTO;
use App\Models\Reservation;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class ScoreLogService extends BasicService
{
    protected ScoreLogHandler $scoreLogHandler;
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->scoreLogHandler = new ScoreLogHandler();
        $this->userRepository = new UserRepository();
    }

    public function addScore(int $userId, int $score, EScoreLogReason $reason): bool
    {
        return DB::transaction(function () use ($userId, $score, $reason) {
            $this->scoreLogHandler->addScore($userId, $score, $reason);

            $userService = new UserService();
            $userService->updateUserScore($userId, $score);

            return true;
        });
    }

    public function processReservationReturnScore(Reservation $reservation): void
    {
        $dueDate = $reservation->due_date->startOfDay();
        $returnDate = $reservation->returned_at->startOfDay();
        $diffDays = $returnDate->diffInDays($dueDate);

        if ($diffDays > 0) {
            $this->processEarlyReturn(userId: $reservation->user_id);
        } elseif ($diffDays < 0) {
            $this->processLateReturn(userId: $reservation->user_id, daysLate: $diffDays);
        }
    }

    private function processEarlyReturn(int $userId): void
    {
        $score = $this->userRepository->getPositiveEarlyReservationPoint(userId: $userId);

        $this->addScore(
            userId: $userId,
            score: $score,
            reason: EScoreLogReason::EarlyReturn
        );
    }

    public function processLateReturn(int $userId, int $daysLate): void
    {
        $baseScore = $this->userRepository->getNegativePerDayLateReservationPoint(userId: $userId);

        $score = $baseScore * abs($daysLate);

        $this->addScore(
            userId: $userId,
            score: -$score,
            reason: EScoreLogReason::LateReturn
        );
    }
}
