<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.subcategories.create', compact('category'));
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
            'sname'=> 'required|min:3|max:191'
        ]);

        $subcategory = new Subcategory;
        $subcategory->name = $request->sname;
        $subcategory->category_id = $request->cname;
        $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.subcategories.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategories.edit', compact('category','subcategory'));
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
            'sname'=> 'required|min:3|max:191'
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->sname;
        $subcategory->category_id = $request->cname;
        $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = subcategory::find($id);
        $subcategory->delete();

        return redirect()->route('subcategories.index');
    }
}
