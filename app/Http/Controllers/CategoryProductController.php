<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CategoryProductController extends Controller
{   public function AuthLogin()
    {
        $admin_id = SESSION::get('admin_id');
        if ($admin_id) {
            return redirect::to('admin.dashnoard');
        } else {
            return redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
          return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get(); 
        return view('admin.all_category_product')->with('all_category_product', $all_category_product);
    }
    public function save_category_product(Request $request ){
        $this->AuthLogin();
        $data = array();
    $data['category_name']=$request->category_product_name;
    $data['category_desc']=$request->category_product_desc;
    $data['category_status']=$request->category_product_status;
    
    DB::table('tbl_category_product')->insert($data);
    Session::put('message','Them danh muc san pham thanh cong');
    return Redirect::to('add_category_product');} 
    public function unactive_category_product($category_product_id){

        echo"123";
    }

   
public function active_category_product($category_product_id){
        
   echo"123";;

}
public function edit_category_product($category_product_id){
    $this->AuthLogin();
    $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
    return view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

}
public function update_category_product(Request $request,$category_product_id ){
    $this->AuthLogin();
    $data = array();
    $data['category_name']=$request->category_product_name;
    $data['category_desc']=$request->category_product_desc;
    DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    Session::put('message','Cap nhat thanh cong');
    return Redirect::to('all_category_product');
} 
public function delete_category_product($category_product_id){
    $this->AuthLogin();
        
     DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    Session::put('message','Xoa thanh cong');
    return Redirect::to('all_category_product');
 
 }

 //end admin page
 public function show_category_home($category_id){
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
      $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->
      where('tbl_product.category_id',$category_id)
      ->get();
      $category_name =DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
     return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)
   ;
 }
 public function show_brand_home($brand_id){
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
      $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
      ->where('tbl_product.brand_id',$brand_id)
      ->get();
     return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)
   ;
 }


}