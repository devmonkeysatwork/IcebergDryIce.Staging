<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogFileRequest extends FormRequest
{
  public function authorize()
  {
    return backpack_auth()->check();
  }

  public function rules()
  {
    return [
      'user_id' => 'required|exists:users,id',
      'order_id' => 'required|exists:orders,id',
      'action_id' => 'required|exists:actions,id',
      'timestamp' => 'required|date',
    ];
  }
}
