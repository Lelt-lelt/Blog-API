@extends('backend.master')
@section('title',' Create')
@section('content')
<div class="row">
	<h1>Create Form</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block">Add Brands New List</h6>
		<a href="{{route('brands.index')}}" class="btn btn btn-outline-info float-right"><i class="fas fa-backward"></i></a>
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
		<form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					 <input type="text" class="form-control" id="categoryName" placeholder="Brands Name" name="name" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Logo</label>
				<div class="col-sm-10">
					<input type="file" name="logo" accept="images/*" required="required">
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