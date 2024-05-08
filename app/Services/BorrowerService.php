<?php

namespace App\Services;

use App\Models\Borrower;
use App\Models\Credit;

class BorrowerService
{
    public function getBorrowerId(string $name): ?int
    {
        $borrower = Borrower::where('name', $name)
            ->first();
        return $borrower->id ?? 0;
    }
    public function getNewBorrowerId(string $name) : int
    {
        $borrower = Borrower::create([
            'name' => $name,
        ]);
        return $borrower->id;
    }
    public function getBorrowerData(string $borrowerName) : array
    {
        $borrowerId = $this->getBorrowerId($borrowerName);
        if ($borrowerId == 0) {
            $borrowerId = $this->getNewBorrowerId($borrowerName);
        }

        $totalAmount = Credit::where('borrower_id', $borrowerId)
            ->where('status', 1)
            ->sum('requested_amount');

        return [
            "borrower_id" => $borrowerId,
            "totalAmountOfCredits" => $totalAmount
        ];
    }
}
