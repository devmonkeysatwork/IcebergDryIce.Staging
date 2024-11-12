<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'sold' => 'required|integer|min:0',
            'income' => 'required|numeric|min:0',
            'bought' => 'required|integer|min:0',
            'expense' => 'required|numeric|min:0',
            'net' => 'required|numeric',
        ];
    }
}
