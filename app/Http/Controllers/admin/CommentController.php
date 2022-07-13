<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function comment(){
        $comments = comment::all();
        return view('admin.comment.comments',compact('comments'));
    }
    public function delete($id){

        $category = comment::find($id);
        $category->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();
    }

}
