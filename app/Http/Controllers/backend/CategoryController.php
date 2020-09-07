<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth')->except('index');
        // $this->middleware('auth')->only('index');
        // $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            'name' => 'required|min:4|max:191',
            'photo' => 'sometimes|mimes:jpeg,bmp,png'
        ]);

        // File upload
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('images'),$imageName);

        $filepath = 'images/'.$imageName;

        // Data insert
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $filepath; // database column name (photo)

        $category->save();

        // Return
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.categories.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
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
            'name' => 'required|min:5|max:191',
            'photo' => 'sometimes|mimes:jpeg,bmp,png'
        ]);

        // File upload
        if ($request->hasFile('photo'))
        {
            $imageName = time().'.'.$request->photo->extension();

            $request->photo->move(public_path('images'),$imageName);

            $filepath = 'images/'.$imageName;
            if (file_exists(public_path($request->oldphoto))) {
                unlink(public_path($request->oldphoto));
            }
        }else
        {
            $filepath = $request->oldphoto;
        }

        // Data update
        $category = Category::find($id);
        $category->name = $request->name;
        $category->photo = $filepath; // database column name (photo)

        $category->save();

        // Return
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
