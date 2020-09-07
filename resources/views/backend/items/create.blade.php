@extends('backend.master')
@section('title',' Create')
@section('content')
<div class="row">
	<h1>Create Form</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block">Items New List</h6>
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
		<form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Code no</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Codeno" name="codeno" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Name" name="name" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-10">
					<input type="file" name="photo" accept="images/*" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Enter Price" name="price" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Discount</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount" name="discount">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Enter Description" name="description" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Brand Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="bname">
						<option selected>Open this brand name</option>
						@foreach($brands as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Category Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="cname">
						<option selected>Open this category name</option>
						@foreach($categories as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
				</div>
			</div> -->
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Subcategory Name</label>
				<div class="col-sm-10">
					<select class="custom-select" name="sname">
						<option selected>Open this category name</option>
						@foreach($subcategories as $row)
						<option value="{{$row->category_id}}">{{$row->name}}</option>
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