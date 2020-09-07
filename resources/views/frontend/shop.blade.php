@extends('frontend.master');
@section('nav')
<!-- <div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Store</a></li>
            @foreach($categories as $row)
            <li class="breadcrumb-item"><a href="#">{{$row->name}}</a></li>
            @endforeach 
            <li class="breadcrumb-item active" aria-current="page"></li>
            <div class="icons ml-auto">
                <a href="{{route('cart')}}" class="icons-btn d-inline-block bag">
                <span class="icon-shopping-bag"></span>
                <span class="number" id="count"></span>
                </a>
            </div>
        </ol>
    </nav>
</div> -->

@endsection
@section('content')
<div class="container shopdiv">
    <div class="row">
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
@endsection