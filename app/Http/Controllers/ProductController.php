<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
	public function checklogin(){
		$admin_id = Session::get('admin_id');
		if($admin_id){
			return redirect('dashboard');
		}
		else{
			echo 'Không có quyền truy cập , vui lòng đăng nhập' ;
			return redirect('admin')->send();
		}

	}
    //
	public function add_product(){
		$this->checklogin();

		$cate_product=DB::table('categories')->orderby('categoryID','desc')->get();
		$brand_product=DB::table('suppliers')->orderby('supplierID','desc')->get();

		return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
	}
	public function all_product(){
		$this->checklogin();
		
		$all_product = DB::table('product')->join('categories','categories.categoryID','=','product.categoryID')->join('suppliers','suppliers.supplierID','=','product.supplierID')->orderby('productID','desc')->get();
		$manager_product = view('admin.all_product')->with('all_product',$all_product);

		return view('admin_layout')->with('admin.all_product',$manager_product);
	}
	public function save_product(Request $Request){
		$data= array();
		$data['product_name'] = $Request->product_name;
		$data['product_price'] = $Request->product_price;
		$data['product_desc'] = $Request->product_desc;				
		$data['product_content'] = $Request->product_content;
		$data['product_status'] = $Request->product_status;
		$data['category_id'] = $Request->product_category;
		$data['brand_id'] = $Request->product_brand;

		$get_img = $Request->file('product_img');
		if($get_img){
			$get_name_image = $get_img->getClientOriginalName();
			$name_img= current(explode('.', $get_name_image));
			$new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
			$get_img->move('public/upload/product',$new_img);
			$data['product_img'] = $new_img;
			DB::table('product')->insert($data);
			Session::put('message','thêm sản phẩm thành công');
			return Redirect::to('/add_product');
		}
		$data['product_img'] = '';
		DB::table('product')->insert($data);
		Session::put('message','thêm sản phẩm thành công');
		return Redirect::to('/add_product');

		
		
	}
	public function unactive_product($product_id){
		DB::table('product')->where('product_id',$product_id)->update(['product_status'=>1]);
		Session::put('message','Hiện danh mục thành công');
		return Redirect::to('/all_product');
	}
	public function active_product($product_id){
		DB::table('product')->where('product_id',$product_id)->update(['product_status'=>0]);
		Session::put('message','Ẩn danh mục thành công');
		return Redirect::to('/all_product');
	}
	public function edit_product($product_id){
		$this->checklogin();

		$cate_product=DB::table('categories')->orderby('category_id','desc')->get();
		$brand_product=DB::table('suppliers')->orderby('brand_id','desc')->get();

		$edit_product = DB::table('product')->where('product_id',$product_id)->get();
		$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
		return view('admin_layout')->with('admin.edit_product',$manager_product);
	}
	public function update_product(Request $Request , $product_id){
		$this->checklogin();
		$data= array();
		$data['product_name'] = $Request->product_name;
		$data['product_price'] = $Request->product_price;
		$data['product_desc'] = $Request->product_desc;				
		$data['product_content'] = $Request->product_content;
		$data['product_status'] = $Request->product_status;
		$data['category_id'] = $Request->product_category;
		$data['brand_id'] = $Request->product_brand;
		$get_img = $Request->file('product_img');
		if($get_img){
			$get_name_image = $get_img->getClientOriginalName();
			$name_img= current(explode('.', $get_name_image));
			$new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
			$get_img->move('public/upload/product',$new_img);
			$data['product_img'] = $new_img;
			DB::table('product')->where('product_id',$product_id)->update($data);
			Session::put('message','Cập nhật sản phẩm thành công');
			return Redirect::to('/all_product');
		}
		DB::table('product')->where('product_id',$product_id)->update($data);
		Session::put('message','Cập nhật sản phẩm thành công');
		return Redirect::to('/all_product');
	}
	public function delete_product($product_id){
		DB::table('product')->where('product_id',$product_id)->delete();
		Session::put('message','Xóa sản phẩm thành công');
		return Redirect::to('/all_product');
	}
}
