@extends('backend.master')
@section('title',' Categories')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('backendTemplate/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="row">
	<h1>Items Form</h1>
</div>
<div class="card shadow">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-flex">Items List</h6>
		<a href="{{route('items.create')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered" cellspacing="0" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Code no</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Description</th>
					<th>Brand</th>
					<!-- <th>Category Name</th> -->
					<th>Subcategory</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Code no</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Description</th>
					<th>Brand</th>
					<!-- <th>Category Name</th> -->
					<th>Subcategory</th>
					<th>Actions</th>
				</tr>
			</tfoot>
			<tbody>
				@php $i=1; @endphp
				@foreach($items as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->codeno}}</td>
					<td>{{$row->name}}</td>
					<td><img src="{{asset($row->photo)}}" width="100" height="50" class="img-fluid"></td>
					<td>{{$row->price}}</td>
					<td>{{$row->discount}}</td>
					<td>{{$row->description}}</td>
					<td>{{$row->subcategory_id}}</td>
					<td>{{$row->brand_id}}</td>
					<td>
						<a href="{{route('items.edit',$row->id)}}" class="btn btn-warning float-left">Edit</a>
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