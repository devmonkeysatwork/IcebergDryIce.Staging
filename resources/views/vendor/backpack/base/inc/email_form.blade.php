@extends(backpack_view('blank'))

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="post" action="{{ route('admin.email.store') }}">
      @csrf
      <div class="card">
        <div class="card-header">{{ trans('Send Email') }}</div>
        <div class="card-body">
          <div class="form-group">
            <label for="to">{{ trans('To') }}</label>
            <input type="email" class="form-control" name="to" id="to" required>
          </div>
          <div class="form-group">
            <label for="subject">{{ trans('Subject') }}</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group">
            <label for="body">{{ trans('Body') }}</label>
            <textarea class="form-control" name="body" id="body" rows="5" required></textarea>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">{{ trans('Send') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection