@extends(backpack_view('blank'))

@section('content')
<div class="container">
  <h2>Emails</h2>
  <div class="row">
    <div class="col-md-4">
      <h3>Templates</h3>
      <div class="btn-group-vertical">
        <button class="btn btn-secondary">All</button>
        <button class="btn btn-secondary">Deliveries</button>
        <button class="btn btn-secondary">Kuehne & Nagel</button>
        <button class="btn btn-secondary">Praxair</button>
        <button class="btn btn-secondary">Sling Shot</button>
      </div>
    </div>
    <div class="col-md-8">
      <h3>Email Content</h3>
      <form>
        <div class="form-group">
          <label for="email-to">To</label>
          <input type="email" class="form-control" id="email-to" value="admin@icebergdryice.com">
        </div>
        <div class="form-group">
          <label for="email-subject">Subject</label>
          <input type="text" class="form-control" id="email-subject" value="Dry Ice Orders - Jul 11">
        </div>
        <div class="form-group">
          <label for="email-body">Body</label>
          <textarea class="form-control" id="email-body" rows="5">
            Konscious    60 lbs. Dry Ice
            Luniu Mall    300 lbs. Dry Ice
            Mott 32    25 lbs. Dry Ice
            Nutri Science    30 lbs. Dry Ice
          </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
</div>
@endsection