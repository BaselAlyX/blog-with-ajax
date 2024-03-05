<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\AjaxCategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Front\ContactController;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;
use App\Http\Controllers\Admin\PostController as AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::name('admin.')->middleware('auth')->prefix('dashboard')->group( function(){
Route::get('/',[AdminController::class,'index'])->name('home');

Route::resource('categories',CategoryController::class);
Route::resource('ajax-categories',AjaxCategoryController::class);
Route::resource('posts',AdminPostController::class);
Route::get('comments',[CommentController::class,'index'])->name('comments.index');
Route::delete('comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');


});

Route::name('front.')->group( function(){

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::post('/send-message', [ContactController::class,'sendMessage'])->name('contact.sendMessage');

Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/posts', [PostController::class,'index'])->name('posts');



});

Auth::routes([

    'register'=>false
]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
