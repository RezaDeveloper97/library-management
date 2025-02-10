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

    protected $reservation;

    public function __construct(ReservationQueue $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Execute the job.
     */
    public function handle(ReservationService $reservationService, ReservationQueueService $reservationQueueService, BookStockRepository $bookStockRepository): void
    {
        DB::transaction(function () use ($reservationService, $reservationQueueService, $bookStockRepository) {
            $bookStock = $bookStockRepository->findById(id: $this->reservation->book_stock_id);
            if (!is_null($bookStock)) {
                $isReserveBook = $reservationService->reserveBook(
                    userId: $this->reservation->user_id,
                    bookStock: $bookStock
                );

                if ($isReserveBook) {
                    $reservationQueueService->completeReservationQueue($this->reservation->id);
                    return true;
                }
            }

            $reservationQueueService->cancelReservationQueue($this->reservation->id);
            return false;
        });
    }
}
