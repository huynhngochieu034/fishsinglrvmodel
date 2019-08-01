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

      public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        
        if($admin_id){
            $users = DB::table('users')->where('id',$admin_id)->first();
            if($users->admin == 0){

            }else{
                //Session::put('message','Bạn không có quyền truy cập.');
            return Redirect::to('/trang-chu')->send();
            }
            ///return Redirect::to('dashboard');
        }else{
            //Session::put('message','Bạn không có quyền truy cập.');
            return Redirect::to('/trang-chu')->send();
        }
    }

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
                $user->phone = $data['phone'];
                $user->address = $data['address'];
    			$user->save();
    			return Redirect::to('/login-register')->with('flash_message_success','Đăng kí thành công!');
    		}
    	}
    }

    public function login(Request $request){
        if($request->isMethod('post')){
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('users')
        ->where('email',$email)
        ->where('password',$password)->first();

        if($result){
            $users = DB::table('users')->where('email',$email)->first();
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
                 if($users->admin == 0){
                     
                     return Redirect::to('/dashboard');     
                }else{
                    return Redirect::to('/trang-chu');
                }
            

        }else {
            return Redirect()->back()->with('flash_message_error','Sai tài khoản hoặc mật khẩu!');
        }
            
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('session_id',null);
    	return Redirect::to('/trang-chu');
    }


}
