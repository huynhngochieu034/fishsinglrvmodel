<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Models\Cart;
class ProductController extends Controller
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
    
   public function add(){
   	$this->AuthLogin();
   		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
   		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    }

    public function all(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();

    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save(Request $request){
    	$this->AuthLogin();

         $Counter = DB::table('tbl_product')->where('product_name',$request->product_name)->count();
        if($Counter > 0){
                 Session::put('messageerror', 'Tên sản phẩm đã tồn tại!');
                return Redirect::to('/add-product');
        }
        else{
    	$data = array();
    	$data['product_name'] = $request->product_name;
		$data['product_price'] = $request->product_price;
        $data['product_stock'] = $request->product_stock;
		$data['product_desc'] = $request->product_desc;
		$data['product_content'] = $request->product_content;
		$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;

    	$get_image = $request->file('product_image');
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));

    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/product',$new_image);
    		$data['product_image']= $new_image;
			DB::table('tbl_product')->insert($data);
    		Session::put('messagesuccess', 'Thêm sản phẩm thành công');
    		return Redirect::to('/add-product');
    	}
    	$data['product_image']= '';
	    DB::table('tbl_product')->insert($data);
	    Session::put('messagesuccess', 'Thêm sản phẩm thành công');
	    return Redirect::to('/all-product');
    }
    }

 	public function unactive($product_id){
 		$this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('messagesuccess', 'Ẩn thương hiệu thành công');
    	return Redirect::to('/all-product');
    }

    public function active($product_id){
    	$this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('messagesuccess', 'Kích hoạt thương hiệu thành công');
    	return Redirect::to('/all-product');	
    }

    public function edit($product_id){
    	$this->AuthLogin();
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
   		$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

 public function update($product_id,Request $request){
 	$this->AuthLogin();
    $Counter = DB::table('tbl_product')->where('product_name',$request->product_name)->count();
        if($Counter > 0){
                 Session::put('messageerror', 'Tên sản phẩm đã tồn tại!');
                return Redirect::to('/all-product');
            }
        else{
       $data = array();
    	$data['product_name'] = $request->product_name;
		$data['product_price'] = $request->product_price;
        $data['product_stock'] = $request->product_stock;
		$data['product_desc'] = $request->product_desc;
		$data['product_content'] = $request->product_content;
		$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;

    	$get_image = $request->file('product_image');

        if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.', $get_name_image));

    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/product',$new_image);
    		$data['product_image']= $new_image;
			DB::table('tbl_product')->where('product_id', $product_id)->update($data);
    		Session::put('message', 'Cập nhật sản phẩm thành công');
    		return Redirect::to('/all-product');
    	}

    	$data['product_image']= $request->product_imagee;
	    DB::table('tbl_product')->where('product_id', $product_id)->update($data);
	    Session::put('messagesuccess', 'Cập nhật sản phẩm thành công');
	    return Redirect::to('/all-product');
    }
    }

    public function delete($product_id){
    	$this->AuthLogin();

          $Counter = DB::table('cart')->where('product_id',$product_id)->count();
            if($Counter > 0){
                 Session::put('messageerror', 'Sản phẩm đã có người đặt không thể xóa!');
                return Redirect::to('/all-product');
            }
        else{
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('messagesuccess', 'Xóa sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    }

    //END ADMIN PAGE
    public function detail($product_id){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();

    	foreach ($details_product as $key => $value) {
    		$category_id = $value->category_id;
    	}

    	$related_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

    	return view('pages.sanpham.show_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('details_product', $details_product)->with('related_product',$related_product);
    }

    public function addtocart(Request $request){


        $cart = new Cart();
        $userid = Session::get('admin_id');

        if($userid){
            $cart->user_id = $userid;
        }else{

            return Redirect::to('/login-register')->with('flash_message_error','Vui lòng đăng nhập(nếu chưa có tài khoản hãy đăng kí)!');
        }
        
        $cart->product_id = $request->product_id;
        $cart->product_name = $request->product_name;
        $cart->price = $request->price;
        $cart->quality = $request->quality;
        $cart->image = $request->image;
        $cart->status = 1;

        $session_id = Session::get('session_id');
         if(empty($session_id)){
             $session_id = str_random(40);
            Session::put('session_id',$session_id);

        }
        if(empty($cart->session_id)){
            $cart->session_id = $session_id;
        }
        

        $countProducts = DB::table('cart')->where(['product_id'=>$request->product_id, 'session_id'=>$session_id])->count();

        if($countProducts > 0){
            return Redirect()->back()->with('flash_message_error','Sản phẩm đã có trong giỏ hàng!');     
        }else{

            $cart->save();
        }
       
       
        return Redirect('cart')->with('flash_message_success','Thêm sản phẩm vào giỏ hàng thành công!');
    }

    public function cart(Request $request){
        $session_id = Session::get('session_id');
        $userCart= DB::table('cart')->where(['session_id'=>$session_id])->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.cart')->with('category',$cate_product)->with('brand',$brand_product)->with(compact('userCart'));
       
    }

    public function deleteCartProduct($id = null){
        DB::table('cart')->where('cart_id',$id)->delete();
        return Redirect('cart')->with('flash_message_success','Xóa sản phẩm thành công!');
    }

    public function updateCartStatus(){
         $session_id = Session::get('session_id');
         
        if($session_id){
            DB::table('cart')->where(['session_id'=>$session_id])->update(['status'=>0]);
            Session::put('session_id',null);
            return Redirect('cart')->with('flash_message_success','Đặt hàng thành công!');
        }else{
            return Redirect('cart')->with('flash_message_error','Chưa có sản phẩm nào!');
        }
       
    }

    public function updateCartQuality($id=null,$quality=null){
        $getCartDetails = DB::table('cart')->where('cart_id',$id)->first();
        $getStock = DB::table('tbl_product')->where('product_id',$getCartDetails->product_id)->first();
        $updateQuality = $getCartDetails->quality + $quality;

        if($getStock->product_stock >= $updateQuality){
           //$total = $getStock->product_stock - $updateQuality;
            //DB::table('tbl_product')->where('product_id', $getCartDetails->product_id)->update(['product_stock'=>$total]);
            DB::table('cart')->where('cart_id',$id)->increment('quality',$quality);
             return Redirect('cart')->with('flash_message_success','Cập nhật số lượng thành công!');
        }else{
            return Redirect('cart')->with('flash_message_error','Số lượng sản phẩm đã đạt tối đa!');
        }
       
    }

    public function allCart(){
        $this->AuthLogin();
        $all_cart = DB::table('cart')
        ->join('users','users.id','=','cart.user_id')->where('cart.status','0')->orderby('cart.user_id','desc')->get();

        $manager_cart = view('admin.all_cart')->with('all_cart',$all_cart);
        return view('admin_layout')->with('admin.all_cart', $manager_cart);
    }

    

}
