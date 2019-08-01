<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
session_start();
class UserController extends Controller
{
	public function userLoginRegister(Request $request){
		return view('users.login_register');

	}

    public function register(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$usersCount = DB::table('users')->where('email',$data['email'])->count();
    		if($usersCount > 0){
    			return Redirect()->back()->with('flash_message_error','Email đã tồn tại!');
    		}else{
    			$user = new User();
    			$user->name = $data['name'];
    			$user->email = $data['email'];
    			$user->password = md5($data['password']);
    			$user->admin = 1;
    			$user->save();
    			return Redirect::to('/login-register')->with('flash_message_success','Đăng kí thành công!');
    		}
    	}
    }

    public function logout(){
    	Auth::logout();
    	return Redirect::to('/')
    }


}
