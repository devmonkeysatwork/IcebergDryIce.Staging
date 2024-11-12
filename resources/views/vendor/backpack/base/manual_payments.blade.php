@extends(backpack_view('blank'))

@section('content')
<div class="container">
  <h2>Manual Payment</h2>
  <div class="row">
    <div class="col-md-6">
      <h3>Contact</h3>
      <form>
        <div class="form-group">
          <label for="contact-name">Name</label>
          <input type="text" class="form-control" id="contact-name" placeholder="Contact Name">
        </div>
        <div class="form-group">
          <label for="contact-email">Email</label>
          <input type="email" class="form-control" id="contact-email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="order-number">Order #</label>
          <input type="text" class="form-control" id="order-number" placeholder="Order #">
        </div>
        <button type="submit" class="btn btn-primary">Review</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
      </form>
    </div>
    <div class="col-md-6">
      <h3>Payment</h3>
      <form>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Description">
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" class="form-control" id="amount" placeholder="Amount - example 15.75">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection