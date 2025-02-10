<?php

namespace App\Handlers;

use App\Models\BookStock;

class BookStockHandler extends BasicHandler
{
    public function updateReservedCopiesBookStock(int $bookStockId, int $newReservedCopies, int $lockVersion): bool
    {
        $updated = BookStock::query()
            ->where('id', $bookStockId)
            ->where('lock_version', $lockVersion)
            ->update([
                'lock_version' => $lockVersion + 1,
                'reserved_copies' => $newReservedCopies
            ]);

        if ($updated > 0) {
            BookStock::clearCacheById($bookStockId);
            return true;
        }

        return false;
    }
}
