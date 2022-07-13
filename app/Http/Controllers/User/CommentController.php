<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function comment(){
        $comments = comment::where('user_id', Auth::id())->latest()->get();
        return view('user.comments.index',compact('comments'));
    }
    public function delete($id){

        $category = comment::find($id);
        $category->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();
    }
}
