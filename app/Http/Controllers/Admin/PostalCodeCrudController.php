<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\PostalCodeRequest;
use App\Models\PostalCode;

/**
 * Class PostalCodeCrudController
 * @package App\Http\Controllers\Admin
 */
class PostalCodeCrudController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

  /**
   * Configure the CrudPanel object. Apply settings to all operations.
   */
  public function setup()
  {
    CRUD::setModel(\App\Models\PostalCode::class);
    CRUD::setRoute(config('backpack.base.route_prefix') . '/postal-codes');
    CRUD::setEntityNameStrings('postal code', 'postal codes');
  }

  /**
   * Define what happens when the List operation is loaded.
   */
  protected function setupListOperation()
  {
    CRUD::column('code')->label('Postal Code');
    CRUD::column('zone');
  }

  /**
   * Define what happens when the Create operation is loaded.
   */
  protected function setupCreateOperation()
  {
    CRUD::setValidation(PostalCodeRequest::class);

    CRUD::addField([
      'name' => 'code',
      'label' => 'Postal Code',
      'type' => 'text',
    ]);

    CRUD::addField([
      'name' => 'zone',
      'label' => 'Zone',
      'type' => 'text',
    ]);
  }

  /**
   * Define what happens when the Update operation is loaded.
   */
  protected function setupUpdateOperation()
  {
    $this->setupCreateOperation();
  }
}
