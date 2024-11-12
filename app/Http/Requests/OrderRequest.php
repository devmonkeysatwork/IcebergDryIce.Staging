<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'amount_of_ice' => 'required|integer|min:10',
            'amount_of_boxes' => 'required|integer|min:0',
            'origin' => 'required|string|max:255',
            'recurring' => 'required|in:recurring,non-recurring',
            'location_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'province' => 'required|in:BC,AB',
            'country' => 'required|string|in:Canada',
            'pickup_delivery' => 'required|in:pickup,delivery',
            'status' => 'required|in:valid,skip,cancelled',
            'delivery_date' => 'required|date',
            'notes' => 'nullable|string',
            'total_cost' => 'required|numeric|min:0',
        ];
    }
}
