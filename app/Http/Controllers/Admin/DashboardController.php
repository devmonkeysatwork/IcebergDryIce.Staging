<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
  public function index()
  {
    // Fetch data for cards
    $totalSalesOnline = Order::where('origin', 'online')->sum('total_cost');
    $totalSalesManual = Order::where('origin', 'manual')->sum('total_cost');
    $dryIceUnitSold = Order::sum('amount_of_ice');
    $styrofoamBoxUnitSold = Order::sum('amount_of_boxes');

    // Fetch data for tables
    $lastOrders = Order::latest()->take(10)->get();
    $ccOrders = Order::where('origin', 'online')->latest()->take(4)->get();
    $recurringOrders = Order::where('recurring', 'recurring')->latest()->take(4)->get();

    return view('vendor.backpack.base.dashboard', compact(
      'totalSalesOnline',
      'totalSalesManual',
      'dryIceUnitSold',
      'styrofoamBoxUnitSold',
      'lastOrders',
      'ccOrders',
      'recurringOrders'
    ));
  }
}
