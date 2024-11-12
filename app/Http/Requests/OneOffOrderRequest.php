<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OneOffOrderRequest extends FormRequest
{
  public function authorize()
  {
    return backpack_auth()->check();
  }

  public function rules()
  {
    return [
      'order_number' => 'required|string|max:255',
      'customer_name' => 'required|string|max:255',
      'item' => 'required|string|max:255',
      'quantity' => 'required|integer|min:1',
      'price' => 'required|numeric|min:0',
      'order_date' => 'required|date',
    ];
  }
}
