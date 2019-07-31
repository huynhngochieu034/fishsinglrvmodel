<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Category;
use App\Http\Requests\RequestCategory;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            ///return Redirect::to('dashboard');
        }else{
            Session::put('message','Bạn không có quyền truy cập.');
            return Redirect::to('admin')->send();
        }
    }
    public function add(){
        $this->AuthLogin();
    	return view('admin.add_category_product');
    }

    public function all(){
        $this->AuthLogin();
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save(Request $request){
        $this->AuthLogin();
        $category = new Category();
    	

        $category->category_name = $request->category_product_name;
        $category->category_desc = $request->category_product_desc;
        $category->category_status = $request->category_product_status;

        // $validate = Category::get()->count()->where('category_name',$request->cate_product_name);
        // //$validate = DB::table('tbl_category_product')->where('category_name',$request->cate_product_name)->count();
        // if($validate == 0){
          
        // }else{
        //     Session::put('message', 'Tên danh mục sản phẩm đã tồn tại.');
        // return Redirect::to('/add-category-product');
        // }

    	$category->save();
    	Session::put('messagesuccess', 'Thêm danh mục sản phẩm thành công');
    	return Redirect::to('/add-category-product');  
    }

 	public function unactive($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('messagesuccess', 'Kích hoạt danh mục sản phẩm thành công');
    	return Redirect::to('/all-category-product');
    }

    public function active($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('messagesuccess', 'Ẩn danh mục sản phẩm thành công');
    	return Redirect::to('/all-category-product');
    }

    public function edit($category_product_id){
$this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

 public function update($category_product_id,Request $request){
    $this->AuthLogin();
    //$category = Category::find($category_product_id);
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
     // $category->category_name = $request->category_product_name;
     //    $category->category_desc = $request->category_product_desc;
     //    $category->category_status = $request->category_product_status;
     //    $category->save();
        Session::put('messagesuccess', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }

    public function delete($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('messagesuccess', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }

    //End Function Admin Page
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }


}
