<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewReserveBookRequest;
use App\Repositories\BookStockRepository;
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
        if (!$bookStockRepository->isBookAvailableInStock(bookStockId: $request->input('book_stock_id'))) {
            return $this->errorMessage('This Book is not available', 500);
        }

        $bookStock = $bookStockRepository->findById(id: $request->input('book_stock_id'));
        if (!$bookStock) {
            return $this->errorMessage('Book not found', 404);
        }

        if ($bookStock->reserved_copies >= $bookStock->total_copies) {
            return $this->errorMessage('Book already reserved, try again', 500);
        }

        $isReserveBook = $reservationService->reserveBook(
            userId: $this->user->id,
            bookStock: $bookStock
        );

        if ($isReserveBook) {
            return $this->successMessage('successfully reserved');
        }

        return $this->errorMessage('Book already reserved, try again', 500);
    }
}
