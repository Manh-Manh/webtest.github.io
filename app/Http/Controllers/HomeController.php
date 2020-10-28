<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //
    public function index(){
    
    $cate_product=DB::table('categories')->orderby('categoryID','desc')->get();
		$supplier=DB::table('suppliers')->orderby('supplierID','desc')->get();
    $product=DB::table('products')->where('status','1')->orderby('productID','desc')->get();
    //$product= $this->doSearch();
    	return view('pages.home')->with('cate_product',$cate_product)->with('supplier',$supplier)->with('product',$product)->with('dataSearch',$supplier);

    }
    public function show_category($category_ID){
    	$cate_product=DB::table('categories')->orderby('categoryID','desc')->get();
		$supplier=DB::table('suppliers')->orderby('supplierID','desc')->get();
    	$all_product = DB::table('products')->join('categories','categories.categoryID','=','products.categoryID')->join('suppliers','suppliers.supplierID','=','products.supplierID')->where('products.categoryID',$category_ID)->orderby('productID','desc')->get();
    	 $name_category = DB::table('categories')->where('categoryID',$category_ID)->orderby('categoryID','desc')->get();
		return view('pages.category')->with('cate_product',$cate_product)->with('supplier',$supplier)->with('all_product',$all_product)->with('name_category',$name_category);


    }
    public function show_supplier($supplier_ID){
    	$cate_product=DB::table('categories')->orderby('categoryID','desc')->get();
		$supplier=DB::table('suppliers')->orderby('supplierID','desc')->get();
    	$all_product = DB::table('products')->join('categories','categories.categoryID','=','products.categoryID')->join('suppliers','suppliers.supplierID','=','products.supplierID')->where('products.supplierID',$supplier_ID)->orderby('productID','desc')->get();
    	 $name_supplier = DB::table('categories')->where('categoryID',$supplier_ID)->orderby('categoryID','desc')->get();
		return view('pages.supplier')->with('cate_product',$cate_product)->with('supplier',$supplier)->with('all_product',$all_product)->with('name_supplier',$name_supplier);

    }
    public function detail($product_ID){
        $cate_product=DB::table('categories')->orderby('categoryID','desc')->get();
        $supplier=DB::table('suppliers')->orderby('supplierID','desc')->get();
       // $product = DB::table('products')->where('productID',$product_ID)->get();
        $product=DB::table('products')->join('categories', 'products.categoryID', '=', 'categories.categoryID')->join('suppliers', 'products.supplierID', '=', 'suppliers.supplierID')->where('productID',$product_ID)->select('productName','quantity','unitPrice','discount','status','products.description as description','thumbnail','image','companyName','address as supAdd','phone as supPhone','website as supWeb','categoryName')->get();
        $img = DB::table('products')->where('productID',$product_ID)->get();

        return view('pages.detail')->with('product',$product)->with('cate_product',$cate_product)->with('supplier',$supplier)->with('img',$img);

    }
    // Truyền các tham số vào hàm này
    public function doSearch()
    {
      $pr= DB::table('products')->where('status','1')->orderby('productID','desc')->get();
      return $pr;
    }
   

    public function index2(Request $request){
    //$dataSearch=array("av","bc");
      if($request->ajax())
      {
        return "is ajax";
      }
      else{

      return "no ajax/";
      }
    }

}