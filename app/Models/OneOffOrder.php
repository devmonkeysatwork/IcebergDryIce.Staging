<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneOffOrder extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $fillable = [
    'order_number',
    'customer_name',
    'item',
    'quantity',
    'price',
    'order_date',
  ];
}
