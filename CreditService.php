<?php

namespace App\Services;

use App\Events\UpdateCreditEvent;
use App\Http\Requests\CreditRequest;
use App\Models\Credit;

class CreditService
{
    public const INTEREST = 0.079;
    public function storeCredit(CreditRequest $request, int $borrowerId): void
    {
        Credit::create(array_merge($request->all(), [
            'credit_number' => $this->generateCreditNumber(),
            'borrower_id' => $borrowerId,
            'total_amount' => $this->getTotalAmountWithInterest($request->get("requested_amount"),
                $request->get("credit_period"))
        ]));
    }

    public static function getActiveCredits(): \Illuminate\Database\Eloquent\Builder
    {
        $credit = new Credit();
        return $credit->getAllCreditsWithBorrowers();
    }

    public function updateCredit(int $creditId, float $amount, int $status=1): void
    {
        $credit = Credit::where('id', '=', $creditId)->first();
        $credit->paid_amount += $amount;
        if ($status === 2) {
            $credit->status = 2;
        }

        UpdateCreditEvent::dispatch($credit);
    }
    public function generateCreditNumber(): string
    {
        $creditNumber = "00000000";
        $lastCreditId = Credit::latest()->first()->id ?? 0;
        $lastCreditId += 1;
        if ($lastCreditId < 10) {
            $lastCreditId = "0" . $lastCreditId;
        }
        $creditNumber .= $lastCreditId;
        return $creditNumber;
    }

    public function getAmountLeft(int $creditId): float
    {
        $creditData = Credit::where('id', '=', $creditId)->first();
        $totalAmountWithInterest = $this->getTotalAmountWithInterest(
            $creditData->requested_amount,
            $creditData->credit_period
        );
        return $totalAmountWithInterest - $creditData->paid_amount;
    }

    public function getTotalAmountWithInterest(float $requestedAmount, int $creditPeriod): float
    {
        $interestIndex = $creditPeriod <= 12 ? 1 : $creditPeriod / 12;
        return ($requestedAmount +  self::INTEREST * $requestedAmount) * $interestIndex;
    }
}
