<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function show_profile(){
        $user = User::find(Auth::user()->id);
        return view('admin.profile',compact('user'));
    }

    public function update_profile(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // die;

    }

    public function change_password(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed'
        ]);

        // cross check the old password
        $oldpass = Auth::user()->password; //hashed
        if(Hash::check($request->old_password,$oldpass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // logout the session
            Auth::logout();
            return redirect('login');
        }
        else{
            Toastr::error('Enter the correct old password :(');
            return redirect()->back();
        }

    }
}
