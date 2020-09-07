@extends('frontend.master')
@section('nav')
<div class="site-wrap">
	<div class="site-navbar bg-white py-2">
		<div class="search-wrap">
			<div class="container">
				<a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
				<form action="#" method="post">
					<input type="text" class="form-control" placeholder="Search keyword and hit enter...">
				</form>  
			</div>
		</div>

		<div class="container">
			<div class="d-flex align-items-center justify-content-between">
				<div class="logo">
					<div class="site-logo">
						<a href="#" class="js-logo-clone">ShopMax</a>
					</div>
				</div>
				<div class="main-nav d-none d-lg-block">
					<nav class="site-navigation text-right text-md-center" role="navigation">
						@if (Route::has('login'))
						<ul class="site-menu js-clone-nav d-none d-lg-block">
							@auth
							<li class="active"><a href="{{route('index')}}">Home</a></li>
							<li class="has-children">
								<a href="#">Store</a>
								<ul class="dropdown">
									@foreach($categories as $row)
									<li class="has-children">
										<a href="{{route('shop',$row->id)}}">{{$row->name}}</a>
										@if(count($row->subcategories) > 0)
										<ul class="dropdown">
											@foreach($row->subcategories as $sub)
											<li><a href="#">{{$sub->name}}</a></li>
											@endforeach
										</ul>
										@endif
									</li>
									@endforeach
								</ul>
							</li>
							<li class="has-children">
								<a href="#">Account</a>
								<ul class="dropdown">
									<li class="has-children"><a href="#">{{ Auth::user()->name }}</a></li>
									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</ul>
						</li>	
						@else
						<li class="has-children">
							<a href="#">Store</a>
							<ul class="dropdown">
								@foreach($categories as $row)
								<li class="has-children">
									<a href="{{route('shop',$row->id)}}">{{$row->name}}</a>
									@if(count($row->subcategories) > 0)
									<ul class="dropdown">
										@foreach($row->subcategories as $sub)
										<li><a href="{{route('shop',$sub->id)}}">{{$sub->name}}</a></li>
										@endforeach
									</ul>
									@endif
								</li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('login')}}">Login</a></li>
						@if (Route::has('register'))
						<li><a href="{{ route('register') }}">Register</a></li>
						@endif
						@endauth
					</ul>
					@endif
						<!-- @if (Route::has('login'))
						<div class="top-right links">
							@auth
							<a href="{{ url('/home') }}">Home</a>
							@else
							<a href="{{ route('login') }}">Login</a>

							@if (Route::has('register'))
							<a href="{{ route('register') }}">Register</a>
							@endif
							@endauth
						</div>
						@endif -->
					</nav>
				</div>
				<div class="icons">
					<a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
					<a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
					<a href="{{route('cart')}}" class="icons-btn d-inline-block bag">
						<span class="icon-shopping-bag"></span>
						<span class="number" id="count"></span>
					</a>
					<a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="site-blocks-cover" data-aos="fade">
		<div class="container">
			<div class="row">
				<div class="col-md-6 ml-auto order-md-2 align-self-start">
					<div class="site-block-cover-content">
						<h2 class="sub-title">#New Summer Collection 2019</h2>
						<h1>Arrivals Sales</h1>
						<p><a href="{{route('shop',$row->id)}}" class="btn btn-black rounded-0">Shop Now</a></p>
					</div>
				</div>
				<div class="col-md-6 order-1 align-self-end">
					<img src="{{asset('frontendTemplate/images/model_3.png')}}" alt="Image" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
			<div class="mt-5">
			</div>
			<div class="card-body">
				<h5 class="card-title mt-3 text-center">Deals and Spical </h5>
			</div>
			<div class="text-center mt-2">
				<a href="#" class="btn btn-dark mt-5 " >Read More</a>
			</div>
		</div>
		@foreach($items as $item)
		<div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
			<div class="">
				<a href="{{route('shopdetail',$item->id)}}"><img src="{{asset($item->photo)}}" class="img-fluid" alt="..."></a>
			</div>
			<div class="card-body">
				<h5 class="card-title">{{$item->name}}</h5>
				<p class="card-text"><del>{{$item->price}}Ks </del>{{$item->discount}}Ks</p>
				@role('customer')
				<div class="">
					<button data-id='{{$item->id}}' data-discount='{{$item->discount}}' data-price='{{$item->price}}' data-name='{{$item->name}}' data-photo='{{$item->photo}}' class="btn btn-dark addtocart">Add to Cart</button>
				</div>
				@else
				<div class="">
					<a href="{{route('register')}}" class="btn btn-dark addtocart">Add to Cart</a>
				</div>
				@endrole
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="container my-3">
	<div class="row">
		<div class="col-md-4">
			<h3 class="text-center" >RECOMMEND ITEMS</h3>
		</div>
		<div class="col-md-7 mr-1">
			<hr>

		</div>
	</div>
</div>

<div class="container my-3">
	<div class="row">
		@foreach($items2 as $items2)
		<div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
			<div class="">
				<a href="{{route('shopdetail',$items2->id)}}"><img src="{{asset($items2->photo)}}" class="img-fluid" alt="..."></a>
			</div>
			<div class="card-body">
				<h5 class="card-title">{{$items2->name}}</h5>
				<p class="card-text">Price: {{$items2->price}}</p>
				@role('customer')
				<div class="">
					<button data-id='{{$items2->id}}' data-discount='{{$items2->discount}}' data-price='{{$items2->price}}' data-name='{{$items2->name}}' data-photo='{{$items2->photo}}' class="btn btn-dark addtocart">Add to Cart</button>
				</div>
				@else
				<div class="">
					<a href="{{route('register')}}" class="btn btn-dark addtocart">Add to Cart</a>
				</div>
				@endrole
			</div>
		</div>
		@endforeach
        <!-- <div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
          <div class="">
            <img src="images/shirt_1.jpg" class="img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">Price:2000</p>
            <div class=""><a href="#" class="btn btn-dark ">Add to cart</a></div>

          </div>
        </div>
        <div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
          <div class="">
            <img src="images/shirt_1.jpg" class="img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">Price:2000</p>
            <div class=""><a href="#" class="btn btn-dark ">Add to cart</a></div>

          </div>
        </div>
        <div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
          <div class="">
            <img src="images/shirt_1.jpg" class="img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">Price:2000</p>
            <div class=""><a href="#" class="btn btn-dark ">Add to cart</a></div>

          </div>
        </div>

        <div class="box col-md-4 m-md-4 col-sm-5 m-sm-3 col-lg-2 mx-lg-3  my-sm-3 my-md-2 my-lg-2 my-4">
          <div class="">
            <img src="images/shirt_1.jpg" class="img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">Price:2000</p>
            <div class=""><a href="#" class="btn btn-dark ">Add to cart</a></div>

          </div>
      </div> -->


  </div>
</div> 
@endsection