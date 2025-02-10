<?php

namespace App\Jobs;

use App\Models\ReservationQueue;
use App\Repositories\BookStockRepository;
use App\Services\ReservationQueueService;
use App\Services\ReservationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class HandleNextReservationQueueJob implements ShouldQueue
{
    use Queueable;

    protected ReservationQueue $reservationQueue;

    public function __construct(ReservationQueue $reservationQueue)
    {
        $this->reservationQueue = $reservationQueue;
    }

    public function handle(ReservationService $reservationService, ReservationQueueService $reservationQueueService, BookStockRepository $bookStockRepository): void
    {
        DB::transaction(function () use ($reservationService, $reservationQueueService, $bookStockRepository) {
            $bookStock = $bookStockRepository->findById(id: $this->reservationQueue->book_stock_id);
            if (!is_null($bookStock)) {
                $isReserveBook = $reservationService->reserveBook(
                    userId: $this->reservationQueue->user_id,
                    bookStock: $bookStock
                );

                if ($isReserveBook) {
                    $reservationQueueService->completeReservationQueue($this->reservationQueue->id);
                    return true;
                }
            }

            $reservationQueueService->cancelReservationQueue($this->reservationQueue->id);
            return false;
        });
    }
}
