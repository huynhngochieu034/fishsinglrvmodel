<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
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
            Session::put('frontSession',$result->email);
                 if($users->admin == 0){
                     
                     return Redirect::to('/dashboard');     
                }else{
                    return Redirect::to('/cart');
                }
            

        }else {
            return Redirect()->back()->with('flash_message_error','Sai tài khoản hoặc mật khẩu!');
        }
            
        }
    }

    public function account(Request $request){
        $user_id = Session::get('admin_id');
        $userDetails = User::find($user_id);

        if($request->isMethod('post')){
            $data = $request->all();
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->save();
            return Redirect()->back()->with('flash_message_success','Cập nhật tài khoản thành công!');

        }

        return view('users.account')->with(compact('userDetails'));
    }

    public function history(){
        $user_id = Session::get('admin_id');
        $userCart= DB::table('cart')->where(['user_id'=>$user_id])->get();
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('users.history')->with('category',$cate_product)->with('brand',$brand_product)->with(compact('userCart'));

    }

    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $user_id = Session::get('admin_id');
        $check_password = User::where('id',$user_id)->first();
        if(md5($current_password) == $check_password->password){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Session::get('admin_id');
            $old_pwd = User::where('id',$user_id)->first();
            $current_pwd = $data['current_pwd'];
            if(md5($current_pwd) == $old_pwd->password){
                    $new_pwd = md5($data['new_pwd']);
                    User::where('id',$user_id)->update(['password'=>$new_pwd]);
                    return Redirect()->back()->with('flash_message_success','Thay đổi mật khẩu thành công!');
            }else{
                  return Redirect()->back()->with('flash_message_error','Mật khẩu hiện tại không đúng!');
            }

        }
    }

    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('session_id',null);
        Session::put('frontSession',null);
    	return Redirect::to('/trang-chu');
    }


}
