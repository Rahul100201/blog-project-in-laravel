<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(){
        $categories = Category::all();
        $post = Post::all();
        return view('admin.post.index', compact('post','categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function post_insert(Request $post){
        // $this->validate($post, [
        //     'title' => 'required|max:255|unique:post',
        //     // 'slug' => 'required|max:255',
        //     'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
        //     // 'category' => 'required',
        //     // 'tags' => 'required',
        //     // 'body' => 'required',
        //     'body' => 'max:255'
        // ]);

        // echo "</pre>";
        // print_r($post->all());
        // die;

        $slug = Str::slug($post->title , '-');
        $data = new Post();
        $data-> title = $post->title;
        $data->user_id = Auth::id();
        $data->category_id = $post->category;
        $data->slug = $slug;
        // $data->status = $post->status;
        $file = $post->file('image');
        $filename = 'image'. time().'.'.$post->image->extension();
        $file->move("upload/post",$filename);
        $data-> image = $filename;
        $data-> body = $post->body;
        if(isset($post->status)){
            $data->status=1;
        }
        $data->save();
        $tags = [];
        $string_tags = array_map('trim', explode(',' , $post->tags));
        foreach($string_tags as $t){
            array_push($tags , ['name'=>$t]);
        }

        $data->tags()->createMany($tags);
        // dd($tags);
        // echo "</pre>";
        // print_r($string_tags);
        // die;
        Toastr::success('Data inserted successfully :)');
        return redirect()->back();
    }


    public function update(Request $data , $id){
        // if($data->title == Post::find($id)->title){
        //     $this->validate($data, [
        //         'title' => 'required|max:255',
        //         // 'slug' => 'required|max:255',
        //         'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
        //         'category' => 'required',
        //         // 'tags' => 'required',
        //         'body' => 'required',
        //         // 'description' => 'max:255'
        //     ]);
        // }
        // else{
        //     $this->validate($data, [
        //         'title' => 'required|max:255|unique:post',
        //         // 'slug' => 'required|max:255',
        //         'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
        //         'category' => 'required',
        //         // 'tags' => 'required',
        //         'body' => 'required',
        //         // 'description' => 'max:255'
        //     ]);
        // }

        $update = Post::find($id);
        if(isset($data->image)){
            $files = $data->file('image');
            $filename = 'image'.time().'.'.$data->image->extension();
            $files->move("upload/post/" , $filename);
            $destination = "upload/post/".$update->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        else{
            $filename = $update->image;
        }
        $slug = Str::slug($data->title , '-');
        $update->user_id = Auth::id();
        $update->title = $data->title;
        $update->category_id = $data->category;
        $update->slug = $slug;

        $update->image = $filename;
        $update->body = $data->body;
        if(isset($data->status)){
            $update->status=1;
        }
        else{
            $update->status=0;
        }
        $update->save();

        // tags code start
        $update->tags()->delete();
        $tags = [];
        $string_tags = array_map('trim', explode(',' , $data->tags));
        foreach($string_tags as $t){
            array_push($tags , ['name'=>$t]);
        }

        $update->tags()->createMany($tags);

        //tag code end

        Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }

    public function delete($id){

        $post = Post::find($id);
        $destination = "/upload/post/".$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $post->tags()->delete();
        $post->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();

        // echo $id;
        // $user = Category::find($id);
        // $user->delete();
        // Toastr::success('Data deleted successfully :)');
        // return redirect()->back();
    }


}


// public function user()
// {
//     return $this->belongsTo(User::class); // user_id
// }
// public function category()
// {
//     return $this->belongsTo(Category::class); // category_id
// }
