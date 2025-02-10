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

    public function getCountDueDateReserve(int $userId)
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.count_due_date');
        }
        return config('library-config.user_types.default.count_due_date');
    }

    public function getPriorityReservationBook(int $userId)
    {
        $user = $this->query->findById($userId);
        if ($user?->is_vip) {
            return config('library-config.user_types.vip.priority_reservation_book');
        }
        return config('library-config.user_types.default.priority_reservation_book');
    }
}
