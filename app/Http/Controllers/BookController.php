<?php

namespace App\Http\Controllers;

use App\Repositories\BookStockRepository;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function listOfBookInStock(Request $request, BookStockRepository $bookStockRepository, BranchRepository $branchRepository): JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $bookId = $request->input('book_id', null);
        $editionId = $request->input('edition_id', null);
        $branchId = $request->input('branch_id', null);

        $provinceId = $request->input('province_id', null);
        $cityId = $request->input('city_id', null);

        if (!is_null($provinceId) && !is_null($cityId)) {
            return $this->errorMessage('error, which one, province_id or city_id');
        }

        if (!is_null($branchId) && (!is_null($provinceId) || !is_null($cityId))) {
            return $this->errorMessage('error, which one, branchId or location');
        }

        $branchesId = !is_null($branchId) ? [$branchId] : null;
        if (!is_null($provinceId) || !is_null($cityId)) {
            $branches = !is_null($provinceId) ?
                $branchRepository->getBranchesByProvinceId($provinceId) :
                $branchRepository->getBranchesByCityId($cityId);

            $branchesId = $branches->pluck('id')->toArray();
        }

        $booksInStock = $bookStockRepository->getListOfBookInStock(
            perPage: $perPage,
            booksId: is_null($bookId) ? null : [$bookId],
            editionsId: is_null($editionId) ? null : [$editionId],
            branchesId: $branchesId,
        );

        return $this->successJson($booksInStock);
    }
}
