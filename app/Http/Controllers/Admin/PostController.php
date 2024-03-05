<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->image);
        $data=$request->validate([

            'title'=>'required|string|min:3',
            'body'=>'required|string|max:2000',
            'category_id'=>'required|exists:categories,id',
            'image'=>'required|image|mimes:png,jpg,gif,jpeg,webp',

        ]);
        $image_name=$request->file('image')->store('storage');
        // dd($image_name);
        $data['image']=$image_name;
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
    $categories = Category::all();
    return view('admin.posts.edit', compact('post', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|min:3',
        'category_id'=>'exists:categories,id',
        'body'=>'required|min:3|string|max:2000',
        'image'=>'image|mimes:png,jpg,jpeg'
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

