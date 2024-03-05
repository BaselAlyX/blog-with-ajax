<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function index(){
        $posts=Post::with('category')->select('id','title','body','category_id','created_at')->
        orderBy('created_at','desc')->take(10)->get();
            return view('front.home',compact('posts'));
        
    }
}
