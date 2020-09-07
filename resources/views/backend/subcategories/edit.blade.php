@extends('backend.master')
@section('title',' Edit')
@section('content')
<div class="row">
	<h1>Edit Form</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block">Edit Category New List</h6>
		<a href="{{route('subcategories.index')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-backward"></i></a>
	</div>
	<div class="card-body">
		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form action="{{route('subcategories.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="sname" required="" value="{{$subcategory->name}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Category Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="cname">
						<option selected>Open this category name</option>
						@foreach($category as $row)
						<option value="{{$row->id}}"
							@if($subcategory->category_id == $row->id) selected @endif
							>{{$row->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save mx-2"></i>Update
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection