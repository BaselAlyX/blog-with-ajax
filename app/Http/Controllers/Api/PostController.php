<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= new PostCollection (Post::with('category')->get());

        return response()->json($posts);
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

            'title'=>'required|string|min:3',
            'body'=>'required|string|max:2000',
            'category_id'=>'required|exists:categories,id',
            'image'=>'required|image|mimes:png,jpg,gif,jpeg,webp',

        ]);
        $image_name=$request->file('image')->store('storage');
        // dd($image_name);
        $data['image']=$image_name;
           $post= Post::create($data);
      return response()->json(new PostResource($post));
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
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
