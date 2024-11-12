<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $fillable = [
    'name',
    'email',
    'phone',
    'address',
    'city',
    'postal_code',
    'province'
  ];

  public function orders()
  {
    return $this->hasMany(Order::class, 'email', 'email');
  }
}
