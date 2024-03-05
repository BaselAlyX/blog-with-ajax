<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(){
        $comments=Comment::with('post')->get();
        return view('admin.comments.index',compact('comments'));
    }

    public function destroy( Comment $comment)
    {

        $comment->delete();
        return back()->with('success',__('admin.deleted'));
    }
}
