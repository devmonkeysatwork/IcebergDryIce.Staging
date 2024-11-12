@extends(backpack_view('blank'))

@section('header')
<section class="container-fluid header">
  <h2>
    <span class="title text-capitalize">Warehouse Sale</span>
  </h2>
  <small><a href="{{ url('admin/warehouse-sales/create') }}" class="btn btn-add btn-sm btn-primary"><i class="la la-plus"></i> Add Warehouse Sale</a></small>
</section>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Sold</th>
            <th>Income</th>
            <th>Bought</th>
            <th>Expense</th>
            <th>Net</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($entries as $entry)
          <tr>
            <td>{{ $entry->date }}</td>
            <td>{{ $entry->sold }}</td>
            <td>{{ $entry->income }}</td>
            <td>{{ $entry->bought }}</td>
            <td>{{ $entry->expense }}</td>
            <td>{{ $entry->net }}</td>
            <td>
              {!! $entry->getPreviewButton($crud) !!}
              {!! $entry->getEditButton($crud) !!}
              {!! $entry->getDeleteButton($crud) !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $entries->links() }} <!-- Pagination links -->
    </div>
  </div>
</div>
@endsection

@section('after_styles')
@vite(['resources/scss/app.scss', 'resources/css/custom.css'])
@endsection

@section('after_scripts')
@vite(['resources/js/app.js'])
@endsection