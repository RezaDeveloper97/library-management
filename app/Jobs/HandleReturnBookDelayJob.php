<?php

namespace App\Jobs;

use App\Enums\EScoreLogReason;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use App\Services\ScoreLogService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class HandleReturnBookDelayJob implements ShouldQueue
{
    use Queueable;

    protected Reservation $reservation;

    public function __construct(int $reservationId)
    {
        $this->reservation = Reservation::query()->find($reservationId);
    }

    public function handle(ScoreLogService $scoreLogService): void
    {
        DB::transaction(function () use ($scoreLogService) {
            $scoreLogService->processReservationReturnScore($this->reservation);
        });
    }
}
