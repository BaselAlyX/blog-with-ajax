<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AjaxCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.ajax-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ajax-categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3',
        ]);
    
        Category::create($data);
    
        return response()->json(['success' => __('admin.added')]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.ajax-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    $data = $request->validate([
        'name' => 'required|string|min:3',
    ]);

    $category->update($data);

    return redirect()->route('admin.ajax-categories.index')->with('success', __('admin.updated'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {

        $category->delete();
        return response()->json(['success' => __('admin.deleted')]);
    }
}
