<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Models\Cart;
class CartController extends Controller
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

    public function allCart(){
         $this->AuthLogin();
        $all_cart = DB::table('cart')
        ->join('users','users.id','=','cart.user_id')->orderby('cart.user_id','desc')->get();

        $manager_cart = view('admin.all_cartv')->with('all_cart',$all_cart);
        return view('admin_layout')->with('admin.all_cartv', $manager_cart);
    }

    public function unactiveCart($id){
        $this->AuthLogin();
        DB::table('cart')->where('cart_id',$id)->update(['status'=>0]);
        Session::put('message', 'Chưa giao hàng');
        return Redirect::to('/all-cart');
    }

    public function activeCart($id){
    	
        $this->AuthLogin();
        DB::table('cart')->where('cart_id',$id)->update(['status'=>1]);
        Session::put('messagesuccess', 'Đã giao hàng');
        return Redirect::to('/all-cart');    
    }

     public function deleteCart($id){

        $this->AuthLogin();
        DB::table('cart')->where('cart_id',$id)->delete();
        Session::put('messagesuccess', 'Xóa sản phẩm khỏi đơn hàng thành công');
        return Redirect::to('/all-cart');
    }

     public function cartQuality($id,$quality=null){
        $getCartDetails = DB::table('cart')->where('cart_id',$id)->first();
        $getStock = DB::table('tbl_product')->where('product_id',$getCartDetails->product_id)->first();
        $updateQuality = $getCartDetails->quality + $quality;

        if($getStock->product_stock >= $updateQuality){
           $total = $getStock->product_stock - $updateQuality;
            DB::table('tbl_product')->where('product_id', $getCartDetails->product_id)->update(['product_stock'=>$total]);
            DB::table('cart')->where('cart_id',$id)->increment('quality',$quality);
            Session::put('messagesuccess', 'Cập nhật số lượng thành công!');
             return Redirect('/all-cart');
        }else{
            Session::put('messagesuccess', 'Số lượng sản phẩm đã đạt tối đa!');
            return Redirect('/all-cart');
       }
       
    }

}
