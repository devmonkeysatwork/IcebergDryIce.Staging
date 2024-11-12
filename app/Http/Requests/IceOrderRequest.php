<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IceOrderRequest extends FormRequest
{
  public function authorize()
  {
    return backpack_auth()->check();
  }

  public function rules()
  {
    return [
      'date' => 'required|date',
      'supplier_name' => 'required|string|max:255',
      'ice_cost' => 'required|numeric|min:0',
      'ice_invoice' => 'required|string|max:255',
      'border_cost' => 'required|numeric|min:0',
      'border_invoice' => 'required|string|max:255',
      'shipper_name' => 'required|string|max:255',
      'shipper_cost' => 'required|numeric|min:0',
      'probill' => 'required|string|max:255',
      'other_description' => 'nullable|string|max:255',
      'other_cost' => 'nullable|numeric|min:0',
      'weight' => 'required|integer|min:0',
      'totes' => 'required|integer|min:0',
    ];
  }
}
