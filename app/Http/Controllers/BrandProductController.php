<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class BrandProductController extends Controller
{     public function AuthLogin()
    {
        $admin_id = SESSION::get('admin_id');
        if ($admin_id) {
            return redirect::to('admin.dashnoard');
        } else {
            return redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
          $this->AuthLogin();
          return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->get(); 
        return view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    }
    public function save_brand_product(Request $request ){
        $this->AuthLogin();
    $data = array();
    $data['brand_name']=$request->brand_product_name;
    $data['brand_desc']=$request->brand_product_desc;
    $data['brand_status']=$request->brand_product_status;
    
    DB::table('tbl_brand')->insert($data);
    Session::put('message','Them thuong hieu san pham thanh cong');
    return Redirect::to('add_brand_product');} 
    public function unactive_brand($brand_id){

    }

   
    public function active_brand($brand_id){
        
   

}
public function edit_brand_product($brand_id){
    $this->AuthLogin();
    $edit_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
    return view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand);

}
public function update_brand_product(Request $request,$brand_id ){
    $this->AuthLogin();
    $data = array();
    $data['brand_name']=$request->brand_product_name;
    $data['brand_desc']=$request->brand_product_desc;
    DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
    Session::put('message','Cap nhat thanh cong');
    return Redirect::to('all_brand_product');
} 
public function delete_brand_product($brand_id){

    $this->AuthLogin();   
     DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
    Session::put('message','Xoa thanh cong');
    return Redirect::to('all_brand_product');
 
 }


}