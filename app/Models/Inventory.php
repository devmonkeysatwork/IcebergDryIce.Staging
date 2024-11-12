<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Inventory extends Model
{
    use CrudTrait;
    use HasFactory;
    use Sortable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'inventories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    // Define the preview button
    public function getPreviewButton($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="' . url($crud->route . '/' . $this->id . '/show') . '"><i class="la la-eye"></i> Preview</a>';
    }

    // Define the edit button
    public function getEditButton($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="' . url($crud->route . '/' . $this->id . '/edit') . '" data-toggle="tooltip" title="Edit"><i class="la la-edit"></i> Edit</a>';
    }

    // Define the delete button
    public function getDeleteButton($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="' . url($crud->route . '/' . $this->id . '/delete') . '" data-toggle="tooltip" title="Delete"><i class="la la-trash"></i> Delete</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
