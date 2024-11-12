<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'start_of_day' => 'required|integer|min:0',
            'warehouse_orders' => 'required|integer|min:0',
            'praxair_supply_orders' => 'required|integer|min:0',
            'online_orders' => 'required|integer|min:0',
            'to_be_received' => 'required|integer|min:0',
            'end_of_day' => 'required|integer|min:0',
            'sublimation' => 'required|integer|min:0',
        ];
    }
}
