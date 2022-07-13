<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\comment;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(6)->get();
        return view('index',compact('posts'));
    }
    public function posts(){
        $posts = Post::where('status',1)->latest()->paginate(4);
        $cat =Category::take(10)->get();
        $l_posts = Post::latest()->get();
        return view('posts',compact('posts','cat', 'l_posts'));
    }
    public function categories(){
        $post = Category::latest()->get();
        return view('categories',compact('post'));
    }
    public function singlepost($slug){
        // echo $id;

        $post= Post::where('slug', $slug)->first();
        // $comment=comment::where('post_id', $post->id);
        //   echo "<pre>";
        //  print ($comment);
        //  die();
        $cat =Category::take(10)->get();
        $l_posts = Post::latest()->get();
        return view('singlepost', compact('post','l_posts','cat'));


    }
    public function category_post($slug){
        $cat=Category::where('slug' , $slug)->first();
        $posts=$cat->posts()->get();
        $cat =Category::take(10)->get();
        // echo "<pre>";
        // print_r($posts);
        // die();
        return view('category_post',compact('cat','posts'));
    }

    public function search(Request $a){
        $this->validate($a, ['search' => 'required|max:255']);
        $search = $a->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        $posts->appends(['search' => $search]);
        $categories = Category::all();
        // echo "<pre>";
        // print_r($posts);
        // die();
        return view('search',compact('categories','posts','search'));
    }
    public function tag_post($name){
        $tags = Tags::where('title', 'like', "%$name%")->paginate(10);
        $categories = Category::all();
        // echo "<pre>";
        // print_r($posts);
        // die();
        return view('tag_posts',compact('tags','$category'));
    }

}
