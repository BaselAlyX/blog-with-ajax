<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
    
        $posts=Post::with('category')->select('id','title','body','category_id','created_at','image')->
        orderBy('created_at','desc')->paginate(20);
            return view('front.posts',compact('posts'));
        //return view ('front.posts');
    }
}
