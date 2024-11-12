<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IceOrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Events\IceOrderPlaced;

/**
 * Class IceOrdersCrudController
 * @package App\Http\Controllers\Admin
 */
class IceOrdersCrudController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

  public function setup()
  {
    CRUD::setModel(\App\Models\IceOrder::class);
    CRUD::setRoute(config('backpack.base.route_prefix') . '/ice-orders');
    CRUD::setEntityNameStrings('ice order', 'ice orders');
  }

  protected function setupListOperation()
  {
    CRUD::column('date');
    CRUD::column('supplier_name');
    CRUD::column('ice_cost');
    CRUD::column('ice_invoice');
    CRUD::column('border_cost');
    CRUD::column('border_invoice');
    CRUD::column('shipper_name');
    CRUD::column('shipper_cost');
    CRUD::column('probill');
    CRUD::column('other_description');
    CRUD::column('other_cost');
    CRUD::column('weight');
    CRUD::column('totes');
  }

  protected function setupCreateOperation()
  {
    CRUD::setValidation(IceOrderRequest::class);

    CRUD::field('date')->type('date');
    CRUD::field('supplier_name')->type('text');
    CRUD::field('ice_cost')->type('number')->attributes(["step" => "0.01"]);
    CRUD::field('ice_invoice')->type('text');
    CRUD::field('border_cost')->type('number')->attributes(["step" => "0.01"]);
    CRUD::field('border_invoice')->type('text');
    CRUD::field('shipper_name')->type('text');
    CRUD::field('shipper_cost')->type('number')->attributes(["step" => "0.01"]);
    CRUD::field('probill')->type('text');
    CRUD::field('other_description')->type('textarea');
    CRUD::field('other_cost')->type('number')->attributes(["step" => "0.01"]);
    CRUD::field('weight')->type('number');
    CRUD::field('totes')->type('number');
  }

  protected function setupUpdateOperation()
  {
    $this->setupCreateOperation();
  }
}
