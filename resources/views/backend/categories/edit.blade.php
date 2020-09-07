@extends('backend.master')
@section('title',' Edit')
@section('content')
<div class="row">
	<h1>Edit Form</h1>
	<a href="{{route('categories.index')}}" class="btn btn btn-outline-info ml-auto mb-5"><i class="fas fa-backward"></i></a>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Category New List</h6>
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
		<form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="name" required="" value="{{$category->name}}">
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
							<img src="{{asset($category->photo)}}" class="img-fluid w-25">
							<input type="hidden" name="oldphoto" value="{{$category->photo}}"> <!-- controller/store -->
						</div>
						<div class="tab-pane" id="new">
							<input type="file" class="form-control-file"  name="photo" accept="image/*">
						</div>
					</div>
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