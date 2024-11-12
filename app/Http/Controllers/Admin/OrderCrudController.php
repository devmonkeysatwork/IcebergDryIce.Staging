<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

class OrderCrudController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

  public function setup()
  {
    CRUD::setModel(Order::class);
    CRUD::setRoute(config('backpack.base.route_prefix') . '/orders');
    CRUD::setEntityNameStrings('order', 'orders');
  }

  protected function setupListOperation()
  {
    CRUD::column('id')->label('Order #');
    CRUD::column('customer_name')->label('Customer Name');
    CRUD::addColumn([
      'name' => 'delivery_date',
      'type' => 'datetime',
      'label' => 'Delivery Date',
      'format' => 'YYYY-MM-DD HH:mm'
    ]);
    CRUD::column('status')->label('Status');
    CRUD::column('total_cost')->label('Total');
    CRUD::column('origin')->label('Origin');
    CRUD::column('recurring')->label('Recurring');

    $this->addCustomFilters();

    // Add buttons to filter orders
    CRUD::addButtonFromView('top', 'all_orders', 'orders_all');
    CRUD::addButtonFromView('top', 'todays_orders', 'orders_today');
    CRUD::addButtonFromView('top', 'future_orders', 'orders_future');
    CRUD::addButtonFromView('top', 'past_orders', 'orders_past');
  }

  protected function setupCreateOperation()
  {
    CRUD::setValidation(OrderRequest::class);

    CRUD::field('customer_name');
    CRUD::field('email');
    CRUD::field('phone');
    CRUD::field('amount_of_ice');
    CRUD::field('amount_of_boxes');
    CRUD::field('origin')->type('enum')->options(['online' => 'Online', 'manual' => 'Manual']);
    CRUD::field('recurring')->type('enum')->options(['recurring' => 'Recurring', 'non-recurring' => 'Non-recurring']);
    CRUD::field('location_name');
    CRUD::field('address');
    CRUD::field('unit')->label('Unit');
    CRUD::field('city');
    CRUD::field('postal_code');
    CRUD::field('province')->type('enum')->options(['BC' => 'BC', 'AB' => 'AB']);
    CRUD::field('country')->label('Country');
    CRUD::field('pickup_delivery')->type('enum')->options(['pickup' => 'Pickup', 'delivery' => 'Delivery']);
    CRUD::field('status')->type('enum')->options(['valid' => 'Valid', 'skip' => 'Skip', 'cancelled' => 'Cancelled']);
    CRUD::field('delivery_date')->type('datetime')->format('YYYY-MM-DD HH:mm');
    CRUD::field('notes')->type('textarea');
    CRUD::field('total_cost');
  }

  protected function setupUpdateOperation()
  {
    $this->setupCreateOperation();
  }

  protected function addCustomFilters()
  {
    // $all = request()->query('all');
    $today = request()->query('today');
    $future = request()->query('future');
    $past = request()->query('past');

    if ($today) {
      CRUD::addClause('whereDate', 'delivery_date', '=', Carbon::today()->toDateString());
    } elseif ($future) {
      CRUD::addClause('whereDate', 'delivery_date', '>', Carbon::today()->toDateString());
    } elseif ($past) {
      CRUD::addClause('whereDate', 'delivery_date', '<', Carbon::today()->toDateString());
    }
  }

  protected function handleCustomerData($data)
  {
    $customer = Customer::updateOrCreate(
      ['email' => $data['email']],
      [
        'name' => $data['customer_name'],
        'phone' => $data['phone'],
        'address' => $data['address'],
        'city' => $data['city'],
        'postal_code' => $data['postal_code'],
        'province' => $data['province'],
        'country' => $data['country']
      ]
    );
    return $customer;
  }

  protected function saveOrder($data)
  {
    $customer = $this->handleCustomerData($data);
    $data['customer_id'] = $customer->id;

    return Order::create($data);
  }

  protected function updateOrder($data, $id)
  {
    $customer = $this->handleCustomerData($data);
    $data['customer_id'] = $customer->id;

    $order = Order::findOrFail($id);
    $order->update($data);
    return $order;
  }

  // Override store method to save order and customer
  public function store()
  {
    $request = $this->crud->validateRequest();
    $data = $request->all();

    $this->saveOrder($data);

    return $this->crud->performSaveAction();
  }

  // Override update method to update order and customer
  public function update($id)
  {
    $request = $this->crud->validateRequest();
    $data = $request->all();

    $this->updateOrder($data, $id);

    return $this->crud->performUpdateAction($id);
  }
}
