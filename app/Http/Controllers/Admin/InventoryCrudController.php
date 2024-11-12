<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InventoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Inventory;

/**
 * Class InventoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InventoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Inventory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/inventory');
        CRUD::setEntityNameStrings('inventory', 'inventories');

        $this->crud->setListView('admin.inventory');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('date');
        CRUD::column('start_of_day');
        CRUD::column('warehouse_orders');
        CRUD::column('praxair_supply_orders');
        CRUD::column('online_orders');
        CRUD::column('to_be_received');
        CRUD::column('end_of_day');
        CRUD::column('sublimation');

        // Example data, replace with actual data fetching logic
        $entries = Inventory::paginate(10); // Use pagination
        $onHand = Inventory::sum('end_of_day'); // Example calculation
        $toBeReceived = Inventory::sum('to_be_received'); // Example calculation

        view()->share('entries', $entries);
        view()->share('onHand', $onHand);
        view()->share('toBeReceived', $toBeReceived);

        $this->crud->setListView('admin.inventory');

        // Add action buttons
        CRUD::addButtonFromModelFunction('line', 'preview', 'getPreviewButton', 'beginning');
        CRUD::addButtonFromModelFunction('line', 'edit', 'getEditButton', 'end');
        CRUD::addButtonFromModelFunction('line', 'delete', 'getDeleteButton', 'end');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InventoryRequest::class);

        CRUD::field('date')->type('date');
        CRUD::field('start_of_day')->type('number');
        CRUD::field('warehouse_orders')->type('number');
        CRUD::field('praxair_supply_orders')->type('number');
        CRUD::field('online_orders')->type('number');
        CRUD::field('to_be_received')->type('number');
        CRUD::field('end_of_day')->type('number');
        CRUD::field('sublimation')->type('number');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
