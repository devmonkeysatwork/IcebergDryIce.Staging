<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IceOrder extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $fillable = [
    'date',
    'supplier_name',
    'ice_cost',
    'ice_invoice',
    'border_cost',
    'border_invoice',
    'shipper_name',
    'shipper_cost',
    'probill',
    'other_description',
    'other_cost',
    'weight',
    'totes',
  ];
}
