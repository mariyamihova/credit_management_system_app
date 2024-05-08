<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditRequest;
use App\Services\BorrowerService;
use App\Services\CreditService;

class CreditController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $allActiveCredits = CreditService::getActiveCredits();
        return view('credits.index', compact('allActiveCredits'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('credits.create');
    }

    public function store(CreditRequest $request, CreditService $creditService, BorrowerService $borrowerService):
    \Illuminate\Http\RedirectResponse
    {
        $borrowerData = $borrowerService->getBorrowerData($request->get("borrower_name"));
        if ($borrowerData['totalAmountOfCredits'] >= 80000) {
            return redirect()->route("credit.index")
                ->withErrors( "You're not allowed to withdraw a new credit");
        }

        $creditService->storeCredit($request, $borrowerData['borrower_id']);
        return redirect()->route("credit.index")
            ->with('success', "Credit created successfully");
    }
}
