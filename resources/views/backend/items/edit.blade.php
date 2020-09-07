@extends('backend.master')
@section('title',' Edit')
@section('content')
<div class="row">
	<h1>Edit Form</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block">Edit Items List</h6>
		<a href="{{route('items.index')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-backward"></i></a>
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
		<form action="{{route('items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Code no</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="codeno" required="required" value="{{$item->codeno}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="name" required="required" value="{{$item->name}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-10">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#old" class="nav-link active" data-toggle="tab">Old Photo</a>
						</li>
						<li class="nav-item">
							<a href="#new" class="nav-link" data-toggle="tab">New Photo</a>
						</li>
					</ul>
					<div class="tab-content my-3">
						<div class="tab-pane fade show active" id="old">
							<img src="{{asset($item->photo)}}" class="img-fluid w-25">
							<input type="hidden" name="oldphoto" value="{{$item->photo}}"> <!-- controller/store -->
						</div>
						<div class="tab-pane" id="new">
							<input type="file" class="form-control-file"  name="photo" accept="image/*">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="price" required="required" value="{{$item->price}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Discount</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="discount" required="required" value="{{$item->discount}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="description" required="required" value="{{$item->description}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Brand Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="bname">
						<option selected>Open this category name</option>
						@foreach($brands as $row)
						<option value="{{$row->id}}"
							@if($item->brand_id == $row->id) selected @endif
							>{{$row->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Subcategory Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="sname">
						<option selected>Open this category name</option>
						@foreach($subcategories as $row)
						<option value="{{$row->id}}"
							@if($item->subcategory_id == $row->id) selected @endif
							>{{$row->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save mx-2"></i>Save
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection