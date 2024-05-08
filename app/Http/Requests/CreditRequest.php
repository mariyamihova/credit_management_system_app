<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'borrower_name' => 'required',
            'requested_amount' => 'required|numeric|min:0,|max:80000',
            'credit_period' => 'required|integer|min:3,|max:120',
        ];
    }
    public function messages(): array
    {
        return [
            'borrower_name.required' => 'The borrower name field is required.',
            'requested_amount.required' => 'The requested amount field is required.',
            'credit_period.required' => 'The credit period field is required.',
            'requested_amount.numeric' => 'The requested amount must be a number.',
            'requested_amount.min' => 'The requested amount must be at least 0.',
            'requested_amount.max' => 'The requested amount must be maximum 80000.',
            'credit_period.integer' => 'The credit period must be a whole number.',
            'credit_period.min' => 'The credit period must be at least 3 months.',
            'credit_period.max' => 'The credit period must be maximum 120 months.',
        ];
    }
}
