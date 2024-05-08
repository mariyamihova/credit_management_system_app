<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'credit_id' => 'required|numeric|exists:credits,id',
            'amount' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'credit_id.required' => 'The credit number field is required.',
            'credit_id.exists' => 'The selected credit id is invalid.',
            'amount.required' => 'The  amount field is required.',
            'amount.numeric' => 'The  amount field must be a number.',
        ];
    }
}
