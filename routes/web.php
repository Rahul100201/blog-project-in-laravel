<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//home controllerr
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories');
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'singlepost'])->name('singlepost');
Route::get('category/{slug}',[App\Http\Controllers\HomeController::class, 'category_post'])->name('category_post');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/tag/{name}',[App\Http\Controllers\HomeController::class, 'tag_post'])->name('tag_post');


// Route::get('/', function () {
//     return view('welcome');
// });



// // view composer
// view::composer('layouts.frontend.partition.sidebar',function($view){
//     $cat =Category::take(10)->get();
//     $l_posts = Post::latest()->get();
//     return $view->with('cat',$cat)->with('l_posts',$l_posts);

// });

//Dashboard Controller
Route::get('/Admin/Dashboard', [DashboardController::class, 'index']);
Route::get('/Admin/Profile', [DashboardController::class, 'show_profile']);
Route::put('admin/profile/update',[DashboardController::class, 'update_profile']);
Route::put('admin/profile/changePassword',[DashboardController::class, 'change_password']);
// $user = User::findOrFail(Auth::user()->id);

//User Controller
Route::get('Admin/Users',[UserController::class, 'index']);
Route::put('admin/user/update/{id}',[UserController::class, 'update']);
Route::delete('admin/user/delete/{id}',[UserController::class, 'delete']);




//Category Controller
Route::get('Admin/Category',[CategoryController::class, 'index']);
Route::post('category_insert',[CategoryController::class,'category_insert']);
Route::get('Admin/Category',[CategoryController::class,'display']);
Route::put('admin/category/update/{id}',[CategoryController::class, 'update']);
Route::delete('admin/category/delete/{id}',[CategoryController::class, 'delete']);

//Post Controller
Route::get('Admin/Post',[PostController::class, 'index']);
Route::get('Admin/Post/Create',[PostController::class, 'create']);
Route::post('post_insert',[PostController::class,'post_insert']);
// Route::get('Admin/Post',[PostController::class,'display']);
Route::put('admin/post/update/{id}',[PostController::class, 'update']);
Route::delete('admin/post/delete/{id}',[PostController::class, 'delete']);


//user dashboard controller
Route::get('user/dashboard', [UserDashboardController::class , 'index'] );


//Auth//Home controller
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});

//comment
Route::post('comment/{post}',[CommentController::class, 'store']);


//comment controller for user
Route::get('User/comments',[UserCommentController::class,'comment']);
Route::get('delete/{id}',[UsercommentController::class,'delete']);

//comment controller for admin
Route::get('Admin/comment',[AdminCommentController::class,'comment']);
Route::get('delete/{id}',[AdminCommentController::class,'delete']);


//comment reply
Route::post('comment_reply/{comment}',[CommentReplyController::class,'store_reply']);
