<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;
use App\Brand;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('backend.items.create', compact('brands','categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
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

        // Return
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.items.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $item = Item::find($id);
        return view('backend.items.edit', compact('brands','categories','subcategories','item'));
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
        // validation
        $request->validate([
            'codeno' => 'required|min:4|max:191',
            'name' => 'required|min:4|max:191',
            'photo' => 'sometimes|mimes:jpeg,bmp,png',
            'price' => 'required|min:4|max:191',
            'discount' => 'required|min:4|max:191',
            'description' => 'required|min:4|max:191'
        ]);

        // File upload
        if ($request->hasFile('photo')) 
        {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'),$imageName);
            $filepath = 'images/'.$imageName;
        }else
        {
            $filepath = $request->oldphoto;
        }

        // Data insert
        $item = Item::find($id);
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->photo = $filepath; // database column name (photo)
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->bname;
        $item->subcategory_id = $request->sname;

        $item->save();

        // Return
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('items.index');
    }
}
