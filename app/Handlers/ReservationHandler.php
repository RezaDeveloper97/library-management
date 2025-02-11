<?php

namespace App\Handlers;

use App\Enums\EReservationStatus;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationHandler extends BasicHandler
{
    public function userReserveBook(int $userId, int $bookStockId, Carbon $dueDate)
    {
        $model = Reservation::query()->create([
            'user_id' => $userId,
            'book_stock_id' => $bookStockId,
            'status' => EReservationStatus::Active,
            'due_date' => $dueDate,
        ]);

        $model->setCacheData();

        return $model;
    }

    public function userReturnReserveBook(int $reservationId, Carbon $returnedAt): bool
    {
        $updated = Reservation::query()
            ->where('id', $reservationId)
            ->update([
                'status' => EReservationStatus::Completed,
                'returned_at' => $returnedAt,
            ]);

        if ($updated > 0) {
            Reservation::clearCacheById($reservationId);
            return true;
        }

        return false;
    }
}
