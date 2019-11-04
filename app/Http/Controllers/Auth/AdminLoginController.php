<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
class AdminLoginController extends Controller
{
    public function create()
    {
        $admin_exist = Admin::all();
        return view('auth.adminLogin',compact('admin_exist'));
    }

    public function adminLogin(Request $request)
    {
         $request->validate([
             'email' => 'required',
              'password' => 'required'
         ]);

     $admin_exist = Admin::where('email',$request->email)->count();
     if($admin_exist>=1){
         $data =  Admin::where('email',$request['email'])->first();
         if(Hash::check($request['password'],$data->password)){
             Session::flash('response', array('type' => 'success', 'message' => 'Welcome to the Admin Dashboard!'));
             return redirect(route('admin.dashboard'));
         }else{
             Session::flash('response', array('type' => 'error', 'message' => 'Wrong Password!'));
             return redirect(route('admin.login'));
         }

     }else{
         Session::flash('response', array('type' => 'error', 'message' => 'E-mail Not Found'));
         return redirect(route('admin.login'));
     }


    }



    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }




}
