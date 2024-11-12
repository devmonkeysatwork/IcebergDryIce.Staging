<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
  public function authorize()
  {
    return backpack_auth()->check();
  }

  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:customers,email,' . $this->id,
      'phone' => 'required|string|max:20',
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'postal_code' => 'required|string|max:20',
      'province' => 'required|in:BC,AB',
    ];
  }
}
