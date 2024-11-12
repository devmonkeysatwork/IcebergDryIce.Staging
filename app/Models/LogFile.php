<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogFile extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $table = 'logs';
  protected $primaryKey = 'id';

  public $incrementing = true;
  protected $keyType = 'int';

  protected $fillable = [
    'customer_id',
    'order_id',
    'action_id',
    'timestamp',
  ];

  public $timestamps = false;
}
