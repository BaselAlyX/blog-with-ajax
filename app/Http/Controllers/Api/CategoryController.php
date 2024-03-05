<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([

            'name'=>'required|string|min:3',
        ]);
           $cat= Category::create($data);
           return response()->json($cat,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::findOrfail($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3',
        ]);
        $category=Category::findOrFail($id);
        $category->update($data);
        return response()->json($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return response()->json([],204);

    }
}
