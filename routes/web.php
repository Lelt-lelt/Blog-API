<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('test',function(){
	return view('testing');
})->name('testpage');

Route::middleware('role:admin')->group(function(){

Route::get('dashboard','backend\BackendController@index')->name('dashboard');

Route::resource('categories','backend\CategoryController');

Route::resource('categories','backend\CategoryController')->middleware('auth');

Route::resource('brands','backend\BrandController');

Route::resource('subcategories','backend\SubcategoryController');

Route::resource('items','backend\ItemController');

});

Route::resource('orders','backend\OrderController');

Auth::routes();

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/','FrontendController@index')->name('index');

Route::get('shop/{id}','FrontendController@shop')->name('shop');

Route::middleware(['auth','role:customer'])->group(function(){
	Route::get('cart','FrontendController@cart')->name('cart');
});

Route::get('shopdetail/{id}','FrontendController@shopdetail')->name('shopdetail');






