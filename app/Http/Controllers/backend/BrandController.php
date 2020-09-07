<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
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
            'name' => 'required|min:3|max:191',
            'logo' => 'sometimes|mimes:jpeg,bmp,png,svg'
        ]);
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$imageName);
        $filepath = 'images/'.$imageName;

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->logo = $filepath;
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.brands.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brands.edit', compact('brand'));
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
            'name' => 'required|min:3|max:191',
            'logo' => 'sometimes|mimes:jpeg,bmp,png,svg'
        ]);

        // File upload
        if ($request->hasFile('logo'))
        {
            $imageName = time().'.'.$request->logo->extension();

            $request->logo->move(public_path('images'),$imageName);

            $filepath = 'images/'.$imageName;
            if (file_exists(public_path($request->oldphoto))) {
                unlink(public_path($request->oldphoto));
            }
        }else
        {
            $filepath = $request->oldphoto;
        }

        // Data update
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->logo = $filepath; // database column name (photo)

        $brand->save();

        // Return
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
