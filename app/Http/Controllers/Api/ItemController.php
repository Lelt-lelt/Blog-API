<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id','desc')->get();
        return ItemResource::collection($items); // all data output
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeno' => 'required|min:4|max:191',
            'name' => 'required|min:4|max:191',
            'photo' => 'sometimes|mimes:jpeg,bmp,png',
            'price' => 'required|min:4|max:191',
            'discount' => 'required|min:1|max:191',
            'description' => 'required|min:4|max:191'
        ]);

        // File upload
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('images'),$imageName);

        $filepath = 'images/'.$imageName;

        // Data insert
        $item = new Item;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->photo = $filepath; // database column name (photo)
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->bname;
        // $item->category_id = $request->cname;
        $item->subcategory_id = $request->sname;

        $item->save();

        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return new ItemResource($item); // one data output
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
