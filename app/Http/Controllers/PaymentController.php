<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Services\CreditService;

class PaymentController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View
    {
        $allActiveCredits = CreditService::getActiveCredits();
        return view('payments.create', ['activeCredits' => $allActiveCredits]);
    }

    public function store(PaymentRequest $request, CreditService $creditService): \Illuminate\Http\RedirectResponse
    {
        $leftAmount = $creditService->getAmountLeft($request->get('credit_id'));
        $amount = floatval($request->get('amount'));
        $message = '';
        if ($amount > $leftAmount) {
            $amount = $leftAmount;
            $creditStatus = 2;
            $message = "Your payment amount is more than your left amount. We will withdraw only the left amount";
        }

        Payment::create(array_merge($request->all(), [
            'amount' => $amount,
        ]));

        $creditService->updateCredit($request->get('credit_id'), $amount, $creditStatus ?? 1);

        return redirect()->route("credit.index")->with('success', "Payment created successfully. " . $message);
    }
}
