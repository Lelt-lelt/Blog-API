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
		<a href="{{route('items.create')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered" cellspacing="0" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Voucher no</th>
					<th>Order Date</th>
					<th>Total</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Voucher no</th>
					<th>Order Date</th>
					<th>Total</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody>
				@php $i=1; @endphp
				@foreach($orders as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->voucherno}}</td>
					<td>{{$row->orderdate}}</td>
					<td>{{$row->total}}</td>
					<td>{{$row->user->name}}</td>
					<td>
						<a href="{{route('orders.show',$row->id)}}" class="btn btn-warning float-left mx-3"><i class="fas fa-eye"></i></a>
						<form method="POST" action="{{route('items.destroy',$row->id)}}" onsubmit="return confirm('Are you sure want to delete')">
							@csrf <!-- because form -->
							@method('DELETE')
							<input type="submit" name="btndelete" class="btn btn-danger" value="Delete">
						</form>
					</td>
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