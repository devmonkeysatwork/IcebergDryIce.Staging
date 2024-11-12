@extends(backpack_view('blank'))

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Warehouse Sales</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Date</th>
          <th>Sold</th>
          <th>Income</th>
          <th>Bought</th>
          <th>Expense</th>
          <th>Net</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>04/04/2024</td>
          <td>0</td>
          <td>$0</td>
          <td>10</td>
          <td>$106.00</td>
          <td class="text-danger">-$106.00</td>
        </tr>
        <tr>
          <td>12/06/2022</td>
          <td>0</td>
          <td>$0</td>
          <td>3810</td>
          <td>$1759.05</td>
          <td class="text-danger">-$1759.05</td>
        </tr>
        <tr>
          <td>11/29/2022</td>
          <td>0</td>
          <td>$0</td>
          <td>3649</td>
          <td>$1701.90</td>
          <td class="text-danger">-$1701.90</td>
        </tr>
        <tr>
          <td>11/23/2022</td>
          <td>0</td>
          <td>$0</td>
          <td>3659</td>
          <td>$1705.45</td>
          <td class="text-danger">-$1705.45</td>
        </tr>
        <tr>
          <td>10/21/2022</td>
          <td>0</td>
          <td>$0</td>
          <td>3645</td>
          <td>$1700.48</td>
          <td class="text-danger">-$1700.48</td>
        </tr>
        <tr>
          <td>10/18/2021</td>
          <td>0</td>
          <td>$0</td>
          <td>3645</td>
          <td>$1700.48</td>
          <td class="text-danger">-$1700.48</td>
        </tr>
        <!-- Add more static rows as needed -->
      </tbody>
    </table>
  </div>
</div>
@endsection