@extends('frontend.master');
@section('nav')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
  </ol>
</nav>
@endsection
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-12 my-5">
      <table class="shoppingcart_div table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Qty</th>
            <th scope="col">Total Price</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody id="shoppingcart_table"></tbody>
        <tfoot id="shoppingcart_tfoot">
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection