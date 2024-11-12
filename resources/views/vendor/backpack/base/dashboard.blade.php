@extends(backpack_view('blank'))

@section('header')
<section class="container-fluid header">
  <h2>
    <span class="title text-capitalize">Dashboard</span>
  </h2>
  <small><a href="{{ url('admin/orders/create') }}" class="btn btn-add btn-sm"><i class="la la-plus"></i> New Order</a></small>
</section>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row flex-row mb-3">
    <div class="col-md-3">
      <div class="card dashboard text-center">
        <div class="card-header">
          Total Online Sales
        </div>
        <div class="card-body">
          <h3>${{ number_format($totalSalesOnline, 2) }}</h3>
          <!-- <p class="card-text stat"><span>27.9% Up</span> from last year</p> -->
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card dashboard text-center">
        <div class="card-header">
          Total Manual Sales
        </div>
        <div class="card-body">
          <h3>${{ number_format($totalSalesManual, 2) }}</h3>
          <!-- <p class="card-text stat"><span>26.6% Up</span> from last year</p> -->
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card dashboard text-center">
        <div class="card-header">
          Dry Ice Units Sold
        </div>
        <div class="card-body">
          <h3>{{ number_format($dryIceUnitSold, 2) }} lbs</h3>
          <!-- <p class="card-text stat"><span>27.0% Up</span> from last year</p> -->
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card dashboard text-center">
        <div class="card-header">
          Styrofoam Boxes Units Sold
        </div>
        <div class="card-body">
          <h3>{{ $styrofoamBoxUnitSold }} boxes</h3>
          <!-- <p class="card-text stat"><span>17.4% Up</span> from last year</p> -->
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="table">
        <div class="table-header">
          Last Orders
        </div>
        <table>
          <thead>
            <tr>
              <th>Order #</th>
              <th>Customer</th>
              <!-- <th>Address</th> -->
              <th>Delivery Date</th>
              <!-- <th>Ice</th> -->
              <!-- <th>Box</th> -->
              <th>Status</th>
              <th>Total</th>
              <th>Origin</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lastOrders as $order)
            <tr data-href="{{ url('admin/orders/' . $order->id . '/show') }}">
              <td>{{ $order->id }}</td>
              <td>{{ $order->customer_name }}</td>
              <!-- <td>{{ $order->address }}</td> -->
              <td>{{ $order->delivery_date }}</td>
              <!-- <td>{{ $order->amount_of_ice }} lbs</td> -->
              <!-- <td>{{ $order->amount_of_boxes }}</td> -->
              <td class="status">{{ $order->status }}</td>
              <td>${{ $order->total_cost }}</td>
              <td>{{ $order->origin }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6">
      <div class="table mb-3">
        <div class="table-header">
          Online Orders
        </div>
        <table>
          <thead>
            <tr>
              <th>Order #</th>
              <th>Customer</th>
              <!-- <th>Address</th> -->
              <th>Delivery Date</th>
              <!-- <th>Ice</th> -->
              <!-- <th>Box</th> -->
              <th>Status</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ccOrders as $order)
            <tr data-href="{{ url('admin/orders/' . $order->id . '/show') }}">
              <td>{{ $order->id }}</td>
              <td>{{ $order->customer_name }}</td>
              <!-- <td>{{ $order->address }}</td> -->
              <td>{{ $order->delivery_date }}</td>
              <!-- <td>{{ $order->amount_of_ice }} lbs</td> -->
              <!-- <td>{{ $order->amount_of_boxes }}</td> -->
              <td class="status">{{ $order->status }}</td>
              <td>${{ $order->total_cost }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="table recurring">
        <div class="table-header">
          Recurring Orders
        </div>
        <table>
          <thead>
            <tr>
              <th>Order #</th>
              <th>Customer</th>
              <!-- <th>Address</th> -->
              <th>Delivery Date</th>
              <!-- <th>Ice</th> -->
              <!-- <th>Box</th> -->
              <th>Status</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recurringOrders as $order)
            <tr data-href="{{ url('admin/orders/' . $order->id . '/show') }}">
              <td>{{ $order->id }}</td>
              <td>{{ $order->customer_name }}</td>
              <!-- <td>{{ $order->address }}</td> -->
              <td>{{ $order->delivery_date }}</td>
              <!-- <td>{{ $order->amount_of_ice }} lbs</td> -->
              <!-- <td>{{ $order->amount_of_boxes }}</td> -->
              <td class="status">{{ $order->status }}</td>
              <td>${{ $order->total_cost }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('after_styles')
@vite(['resources/scss/app.scss', 'resources/css/custom.css'])
<style>
    
    body {
      background-color: #F5F6FA
      color: black;
    }
    
    .navbar .nav-link {
      display: flex;
    }
    
    .container-fluid h2 .title {
      font-weight: 700;
    }
    
    .container-fluid.header {
      display: flex;
      justify-content: space-between;
      padding: 0 24px 20px;
    }
    
    .container-fluid .btn-add {
      padding: 8px 16px;
      font-weight: 500;
      font-size: 14px;
    }
    
    .row.flex-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    
    .row.flex-row > .col-md-3 {
      flex: 1;
      min-width: 250px;
      display: flex;
    }
    
    .card {
      flex: 1;
      border: none;
      border-radius: 8px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      background-color: #221e26;
    }
    
    .card-header {
      --bs-bg-opacity: 1 !important;
      background-color: #221e26;
      color: #ffffff;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    
    .card-body {
      background-color: white;
      position: relative;
      padding: 24px 32px 16px;
      text-align: left;
      height: 130px;
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
    }
    
    .card-body h3 {
      font-weight: 700;
    }
    
    .card-body .card-text {
      color: var(--tblr-card-text);
      font-size: 14px;
      transform: translateY(-40%);
    }
    
    .card.dashboard .card-body .card-text.stat {
      position: absolute;
      bottom: 5px;
      left: 32px;
      font-size: 16px;
      width: fit-content;
    }
    
    .card-body .card-text span {
      color: var(--tblr-success);
      margin-right: 4px;
    }
    
    .card .card-body.inventory {
      height: fit-content;
      padding: 16px 64px;
    }
    
    .card .card-body .stat {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
      text-align: center;
    }
    
    .card .card-body .stat.right {
      flex-direction: column;
    }
    
    .card .card-body .stat h5 {
      display: flex;
      flex-direction: column;
      text-transform: uppercase;
      font-size: 12px
    }
    
    .card .card-body .stat h5 span {
      font-size: 24px;
      font-weight: 700;
    }
    
    .row .table-header {
      font-weight: 500;
    }
    
    .row .table-head-wrapper {
      overflow: hidden;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    
    .row table {
      width: 100%;
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0 15px;
    }
    
    .row table thead tr {
      --bs-bg-opacity: 1 !important;
      background-color: #221e26 !important;
      color: var(--tblr-secondary-text-emphasis);
      text-transform: capitalize;
      padding: 10px 0;  
    }
    
    .row table thead tr th {
      color: white;
      text-transform: capitalize;
      font-size: 14px;
      font-weight: 500;
    }
    
    .row table th,
    .row table td {
      font-size: 14px;
      padding: 12px 15px;
      vertical-align: middle;
    }
    
    .row table tbody tr {
      background-color: white;
      color: var(--tblr-body-color);
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      padding: 10px 5px;
    }
    
    .row table tbody tr td {
      padding: 15px;
    }
    
    .row table tbody tr:hover {
      background-color: var(--tblr-secondary-bg-subtle);
    }
    
    .row .table.recurring {
      margin-top: 38px;
    }
    
    .form-group.entries {
      display: flex;
      flex-direction: row-reverse;
      float: inline-start;
      gap: 5px;
      font-size: 14px;
    }
    
    .form-group .form-control {
      width: 62px;
      height: 23.14px;
      font-size: 14px;
      padding: 0;
    }
    
    /* Status Colors */
    
    td.status {
      text-transform: capitalize;
      transform: translateY(10px);
    }
    
    .status.valid {
      color: var(--tblr-success);
      font-weight: bold;
    }
    
    .status.skip {
      color: var(--tblr-warning);
      font-weight: bold;
    }
    
    .status.cancelled {
      color: var(--tblr-danger);
      font-weight: bold;
    }
    
    .btn-add {
      background-color: var(--tblr-primary);
      border: none;
      color: var(--tblr-light);
      border-radius: 4px;
    }
    
    .btn-add:hover {
      background-color: #0246a5;
      color: var(--tblr-light);
    }
    
    @media (min-width: 1400px) {
      .container-xxl,
      .container-xl,
      .container-lg,
      .container-md,
      .container-sm,
      .container {
        max-width: 1328px;
      }
    }
    
    footer {
        display: none;
    }
    
</style>

@endsection

@section('after_scripts')
@vite(['resources/js/app.js'])
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tr[data-href]');
    rows.forEach(row => {
      row.addEventListener('click', function() {
        window.location.href = this.dataset.href;
      });
      row.style.cursor = 'pointer'; // Optional: Change cursor to pointer to indicate row is clickable
    });
  });
</script>
@endsection