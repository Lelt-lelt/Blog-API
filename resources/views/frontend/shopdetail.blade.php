@extends('frontend.master');
@section('content')
    <div class="container detailstart">
        @foreach($shopdetail as $row)
        <div class="pdp-block__main-information">           
            <div class="row">              
                <div class="col-md-6 pt-5 pl-5 col-sm-12 pt-sm-5">
                    <img src="{{asset($row->photo)}}"  class="shadow-lg p-3 mb-5 bg-white rounded detailimg">
                </div>
                <div class="col-md-6 pl-1 col-sm-12">
                    <h5 class="pt-5">{{$row->name}}</h5>
                    <i class="far fa-star staricon"></i>
                    <i class="far fa-star staricon"></i>
                    <i class="far fa-star staricon"></i>
                    <i class="far fa-star staricon"></i>
                    <i class="far fa-star staricon"></i>
                    
                    <p class="pt-5 pt-sm-5">Brand: {{$row->brand_id}}</p>
                    <hr class="shophr">

                    <p class="price">{{$row->price}}</p>
                    <div >
                    <p class="d-inline-block mr-5" >Quantity:</p> <button class="shopicon"> <i class="fas fa-plus qtyicon"></i></button><input type="number" class="shopqty text-center" name="quantity" value="1"><button class="shopicon"><i class="fas fa-minus qtyicon"></i></button>
                    </div>
                    <div class="pt-4 pt-sm-4">
                        <button type="button" class="buynowbtn float-left">Buy Now</button>
                        <div class="card w-25 bg-info">
                            <button class="btn addtocart my-1 text-white" data-id="{{$row->id}}" data-photo="{{asset($row->photo)}}" data-name="{{$row->name}}" data-price="{{$row->price}}" data-discount="{{$row->discount}}">Add to cart</button>
                        </div>
                    </div>
                </div>               
            </div>           
        </div>
        @endforeach
    </div>   
@endsection