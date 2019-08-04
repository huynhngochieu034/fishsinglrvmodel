<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
   		$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
   		
   		/*$all_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();*/
    	$all_product = DB::table('tbl_product')->where('product_status','0')->where('brand_id','1')->orderby('product_id','desc')->limit(6)->get();

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function introduce(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('introduce')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function guide(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('guide')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function phongbenh(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('phongbenh')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function phongbenhnam(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('phongbenhnam')->with('category',$cate_product)->with('brand',$brand_product);
    }


}
