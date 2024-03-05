<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }
    public function sendMessage(Request $request){
        $data=$request->validate([
        "name" => "required|string|min:3",
        "email" => "required|email|max:70",
        "phone" => "required|numeric|",
        "message" => "required|string|min:10|max:1000",
        
    ]);
    Contact::create($data);
        //$data=$request->all();
        return back()->with('success','data sent successfully');    }
}
