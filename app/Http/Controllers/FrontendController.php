<?php

namespace App\Http\Controllers;
use App\Item;
use App\Category;
use App\Subcategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{ 
    public function index($value='')
    {
      // $items = Item::all();
      // $items = DB::table('items')->where('discount','>',0)->get();
      // $items2 = DB::table('items')->where('discount','=',0)->get();
      $categories = Category::all();
      $items = Item::where('discount','>',0)->get();
      $items2 = Item::where('discount',0)
                      // ->take(3)
                      ->get();
  		return view('frontend.index', compact('items','items2','categories'));
    }
    public function shop($id)
    {
      $categories = Category::all();
      $items = Item::where('subcategory_id',$id)->get();
  		return view('frontend.shop',compact('items','categories'));
    }
    public function cart($value='')
    {
  		return view('frontend.cart');
    }
    public function shopdetail($id)
    {
      $shopdetail = Item::find($id)->get();
  		return view('frontend.shopdetail',compact('shopdetail'));
    }
}
