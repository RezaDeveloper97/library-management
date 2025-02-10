<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterBookStockRequest;
use App\Repositories\BookRepository;
use App\Repositories\BookStockRepository;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function listOfBookInStock(FilterBookStockRequest $request, BookStockRepository $bookStockRepository, BranchRepository $branchRepository, BookRepository $bookRepository): JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $bookId = $request->input('book_id', null);
        $bookTitle = $request->input('book_title', null);
        $editionId = $request->input('edition_id', null);
        $branchId = $request->input('branch_id', null);
        $provinceId = $request->input('province_id', null);
        $cityId = $request->input('city_id', null);

        $branchesId = !is_null($branchId) ? [$branchId] : null;
        if (!is_null($provinceId) || !is_null($cityId)) {
            $branches = !is_null($provinceId) ?
                $branchRepository->getBranchesByProvinceId($provinceId) :
                $branchRepository->getBranchesByCityId($cityId);

            $branchesId = $branches->pluck('id')->toArray();
        }

        $booksId = !is_null($bookId) ? [$bookId] : null;
        if (!is_null($bookTitle)) {
            $books = $bookRepository->searchByTitle($bookTitle);
            $booksId = $books->pluck('id')->toArray();
        }

        $booksInStock = $bookStockRepository->getListOfBookInStock(
            perPage: $perPage,
            booksId: $booksId,
            editionsId: is_null($editionId) ? null : [$editionId],
            branchesId: $branchesId,
        );

        return $this->successJson($booksInStock);
    }
}
