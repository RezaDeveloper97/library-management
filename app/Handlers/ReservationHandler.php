<?php

namespace App\Handlers;

use app\Enums\EReservationStatus;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationHandler extends BasicHandler
{
    public function userReserveBook(int $userId, int $bookStockId, EReservationStatus $status, Carbon $dueDate)
    {
        $model = Reservation::query()->create([
            'user_id' => $userId,
            'book_stock_id' => $bookStockId,
            'status' => $status,
            'due_date' => $dueDate,
        ]);

        $model->setCacheData();

        return $model;
    }
}
