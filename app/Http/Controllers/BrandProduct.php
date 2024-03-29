<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;
session_start();
class BrandProduct extends Controller
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
    	return view('admin.add_brand_product');
    }

    public function all(){
$this->AuthLogin();
    	$all_brand_product = DB::table('tbl_brand')->get();
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function save(Request $request){
        $this->AuthLogin();
        $Counter = DB::table('tbl_brand')->where('brand_name',$request->brand_product_name)->count();
        if($Counter > 0){
                 Session::put('messageerror', 'Tên thương hiệu đã tồn tại!');
                return Redirect::to('/add-brand-product');
        }
        else{

        $brand = new Brand();
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_desc = $request->brand_product_desc;
        $brand->brand_status = $request->brand_product_status;
        $brand->save();
        
        Session::put('messagesuccess', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('/add-brand-product');
        }
    }

 	public function unactive($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
    	Session::put('messagesuccess', 'Kích hoạt thương hiệu thành công');
    	return Redirect::to('/all-brand-product');
    }

    public function active($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
    	Session::put('messagesuccess', 'Ẩn thương hiệu thành công');
    	return Redirect::to('/all-brand-product');
    }

    public function edit($brand_product_id){
        $this->AuthLogin();
 
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

 public function update($brand_product_id,Request $request){
    $this->AuthLogin();
         $Counter = DB::table('tbl_brand')->where('brand_name',$request->brand_product_name)->count();
        if($Counter > 0){
                 Session::put('messageerror', 'Tên thương hiệu đã tồn tại!');
                return Redirect::to('/all-brand-product');
            }
        else{
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('messagesuccess', 'Cập nhật thương hiệu thành công');
        return Redirect::to('/all-brand-product');
    }
    }

    public function delete($brand_product_id){
        $this->AuthLogin();
         $Counter = DB::table('tbl_product')->where('brand_id',$brand_product_id)->count();
            if($Counter > 0){
                 Session::put('messageerror', 'Thương hiệu đã có sản phẩm không thể xóa!');
                return Redirect::to('/all-brand-product');
            }
        else{

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('messagesuccess', 'Xóa thương hiệu thành công');
        return Redirect::to('/all-brand-product');
    }
    }

    ///eND page admin
     public function show_brand_home($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
