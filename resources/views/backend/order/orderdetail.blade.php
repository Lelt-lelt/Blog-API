@extends('backend.master')
@section('title',' Order Report')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('backendTemplate/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="row">
	<h1>Order Report</h1>
</div>
<div class="card shadow">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-flex">Order Report</h6>
		<a href="{{route('orders.index')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-arrow"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered" cellspacing="0" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Quantity</th>
				</tr>
			</tfoot>
			<tbody>
				@php $i=1; @endphp
				@foreach($orderdetails as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->itemname}}</td>
					<td>{{$row->qty}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('backendTemplate/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backendTemplate/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backendTemplate/js/demo/datatables-demo.js')}}"></script>
@endsection