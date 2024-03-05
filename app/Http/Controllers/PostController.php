<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([

            'name'=>'required|string|min:3',
        ]);
            Post::create($data);
      return back()->with('success',__('admin.added'));
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
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'name' => 'required|string|min:3',
    ]);

    $post->update($data);

    return redirect()->route('admin.posts.index')->with('success', __('admin.updated'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Post $post)
    {

        $post->delete();
        return back()->with('success',__('admin.deleted'));
    }
}
