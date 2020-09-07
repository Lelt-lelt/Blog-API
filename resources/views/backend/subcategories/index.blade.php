@extends('backend.master')
@section('title',' Categories')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('backendTemplate/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="row">
	<h1>Subcategories Form</h1>
</div>
<div class="card shadow">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-flex">Subcategory List</h6>
		<a href="{{route('subcategories.create')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered" cellspacing="0" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Subcategory Name</th>
					<th>Category Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Subcategory Name</th>
					<th>Category Name</th>
					<th>Actions</th>
				</tr>
			</tfoot>
			<tbody>
				@php $i=1; @endphp
				@foreach($subcategories as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->category_id}}</td>
					<td>
						<a href="{{route('subcategories.edit',$row->id)}}" class="btn btn-warning float-left mx-3">Edit</a>
						<form method="POST" action="{{route('subcategories.destroy',$row->id)}}" onsubmit="return confirm('Are you sure want to delete')">
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