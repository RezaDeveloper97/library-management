<?php

namespace App\Http\Controllers;

use App\Enums\EReservationStatus;
use App\Http\Requests\NewReserveBookRequest;
use App\Http\Requests\ReturnReserveBookRequest;
use App\Repositories\BookStockRepository;
use App\Repositories\ReservationRepository;
use App\Services\ReservationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReserveBookController extends Controller
{
    /**
     * @throws \Exception
     */
    public function newReserveBook(NewReserveBookRequest $request, BookStockRepository $bookStockRepository, ReservationService $reservationService): JsonResponse
    {
        $bookStock = $bookStockRepository->findById(id: $request->input('book_stock_id'));
        if (!$bookStock) {
            return $this->errorMessage('Book not found', 404);
        }

        $isReserveBook = $reservationService->reserveBook(
            userId: $this->user->id,
            bookStock: $bookStock
        );

        if ($isReserveBook) {
            return $this->successMessage('successfully reserved');
        }

        return $this->successMessage('This book has been added to your reservation queue. Please wait for a notification.');
    }

    /**
     * @throws \Exception
     */
    public function returnReserveBook(ReturnReserveBookRequest $request, BookStockRepository $bookStockRepository, ReservationService $reservationService, ReservationRepository $reservationRepository): JsonResponse
    {
        $reservation = $reservationRepository->find(id: $request->input('reservation_id'));
        if (!$reservation) {
            return $this->errorMessage('Reservation not found', 404);
        }

        if ($reservation->user_id !== $this->user->id) {
            return $this->errorMessage('You do not have permission to access this.', 403);
        }

        if ($reservation->status !== EReservationStatus::Active) {
            return $this->errorMessage('this reservation is finish', 404);
        }

        $reservation->load('bookStock');
        $bookStock = $reservation->bookStock;

        $isReturnReserveBook = $reservationService->returnReserveBook(
            reservationId: $reservation->id,
            bookStock: $bookStock
        );

        if ($isReturnReserveBook) {
            return $this->successMessage('successfully return reserved');
        }

        return $this->successMessage('Failed to return the book. Please try again later.');
    }
}
