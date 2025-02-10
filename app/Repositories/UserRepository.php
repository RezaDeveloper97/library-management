<?php

namespace App\Repositories;

use App\Queries\UserQuery;

class UserRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new UserQuery();
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function findByEmail(string $email)
    {
        return $this->query->findByEmail($email);
    }

    public function getCountDueDateReserve(int $userId): int
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.count_due_date');
        }
        return config('library-config.user_types.default.count_due_date');
    }

    public function getPriorityReservationBook(int $userId): int
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.priority_reservation_book');
        }
        return config('library-config.user_types.default.priority_reservation_book');
    }

    public function getNegativePerDayLateReservationPoint(int $userId): int
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.score_rule_points.negative_per_day_late');
        }
        return config('library-config.user_types.default.score_rule_points.negative_per_day_late');
    }

    public function getPositiveEarlyReservationPoint(int $userId): int
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.score_rule_points.positive_early');
        }
        return config('library-config.user_types.default.score_rule_points.positive_early');
    }
}
