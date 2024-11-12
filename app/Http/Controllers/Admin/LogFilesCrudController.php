<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\LogFileRequest;
use App\Models\LogFile;

/**
 * Class LogFilesCrudController
 * @package App\Http\Controllers\Admin
 */
class LogFilesCrudController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

  public function setup()
  {
    CRUD::setModel(LogFile::class);
    CRUD::setRoute(config('backpack.base.route_prefix') . '/log-files');
    CRUD::setEntityNameStrings('log file', 'log files');
  }

  protected function setupListOperation()
  {
    CRUD::column('id')->label('Log ID');
    CRUD::column('customer_id')->label('User ID');
    CRUD::column('order_id')->label('Order ID');
    CRUD::column('action_id')->label('Action ID');
    CRUD::column('timestamp')->label('Timestamp');
  }

  protected function setupCreateOperation()
  {
    CRUD::setValidation(LogFileRequest::class);

    CRUD::field('customer_id')->label('User ID');
    CRUD::field('order_id')->label('Order ID');
    CRUD::field('action_id')->label('Action ID');
    CRUD::field('timestamp')->label('Timestamp');
  }

  protected function setupUpdateOperation()
  {
    $this->setupCreateOperation();
  }
}
