<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryPageController extends Controller
{
  public function index(Request $request)
  {
    $query = Inventory::query();

    if ($request->has('search')) {
      $query->where('date', 'like', '%' . $request->search . '%')
        ->orWhere('start_of_day', 'like', '%' . $request->search . '%')
        ->orWhere('warehouse_orders', 'like', '%' . $request->search . '%')
        ->orWhere('praxair_supply_orders', 'like', '%' . $request->search . '%')
        ->orWhere('online_orders', 'like', '%' . $request->search . '%')
        ->orWhere('to_be_received', 'like', '%' . $request->search . '%')
        ->orWhere('end_of_day', 'like', '%' . $request->search . '%')
        ->orWhere('sublimation', 'like', '%' . $request->search . '%');
    }

    if ($request->has('sort')) {
      $query->orderBy($request->sort, $request->get('direction', 'asc'));
    }

    $perPage = $request->get('per_page', 10);
    $entries = $query->paginate($perPage);

    $onHand = Inventory::sum('end_of_day'); // Example calculation
    $toBeReceived = Inventory::sum('to_be_received'); // Example calculation

    return view('admin.inventory', compact('entries', 'onHand', 'toBeReceived'));
  }
}
