<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class ProductController extends Controller
{
  public function AuthLogin()
  {
    $admin_id = SESSION::get('admin_id');
    if ($admin_id) {
      return redirect::to('admin.dashnoard');
    } else {
      return redirect::to('admin')->send();
    }
  }
  public function add_product()
  {
    $this->AuthLogin();
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

    return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
  }

  public function all_product()
  {
    $this->AuthLogin();
    $all_product = DB::table('tbl_product')
      ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
      ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')->orderBy('product_id', 'desc')->get();
    return view('admin.all_product')->with('all_product', $all_product);
  }
  public function save_product(Request $request)
  {
    $this->AuthLogin();
    $data = array();
    $data['product_name'] = $request->product_name;
    $data['product_price'] = $request->product_price;
    $data['product_status'] = $request->product_status;
    $data['brand_id'] = $request->product_brand;
    $data['category_id'] = $request->product_cate;
    $data['product_desc'] = $request->product_desc;
    $data['product_content'] = $request->product_content;
    $data['product_image'] = $request->product_image;
    $get_image = $request->file('product_image');
    if ($get_image) {
      $get_name_image = $get_image->getClientOriginalExtension();
      $name_image = current(explode('.', $get_name_image));
      $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/product', $new_image);
      $data['product_image'] = $new_image;
      DB::table('tbl_product')->insert($data);
      Session::put('message', 'Them san pham thanh cong');
      return Redirect::to('all_product');
    }


    $data['product_image'] = '';
    DB::table('tbl_product')->insert($data);
    Session::put('message', 'Them san pham thanh cong');
    return Redirect::to('all_product');
  }

  public function edit_product($product_id)
  {
    $this->AuthLogin();

    $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
    $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
    return view('admin.edit_product')->with('edit_product', $edit_product)
      ->with('cate_product', $cate_product)->with('brand_product', $brand_product);
  }
  public function update_product(Request $request, $product_id)
  {
    $this->AuthLogin();
    $data = array();
    $data['product_name'] = $request->product_name;
    $data['product_price'] = $request->product_price;
    $data['product_status'] = $request->product_status;
    $data['brand_id'] = $request->product_brand;
    $data['category_id'] = $request->product_cate;
    $data['product_desc'] = $request->product_desc;
    $data['product_content'] = $request->product_content;

    $get_image = $request->file('product_image');
    if ($get_image) {
      $get_name_image = $get_image->getClientOriginalExtension();
      $name_image = current(explode('.', $get_name_image));
      $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/product', $new_image);
      $data['product_image'] = $new_image;
      DB::table('tbl_product')->where('product_id',$product_id)->update($data);
      Session::put('message', 'Cap nhat san pham thanh cong');
      return Redirect::to('all_product');
    }



    DB::table('tbl_product')->where('product_id', $product_id)->update($data);
    Session::put('message', 'Cap nhat san pham thanh cong');
    return Redirect::to('all_product');
  }
  public function delete_product($product_id)
  {
    $this->AuthLogin();


    DB::table('tbl_product')->where('product_id', $product_id)->delete();
    Session::put('message', 'Xoa thanh cong');
    return Redirect::to('all_product');
  }
  //
  public function detail_product($product_id){
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
    $detail_product = DB::table('tbl_product')
      ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
      ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();
     foreach($detail_product as $key => $value)
         $category_id =$value->category_id;
         $related_product = DB::table('tbl_product')
         ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
         ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
         ->where('tbl_category_product.category_id',$category_id)->WhereNotIn('tbl_product.product_id',[$product_id])->get();


    

    return view('pages.sanpham.show_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('product_detail',$detail_product)
    ->with('relate', $related_product);
  }
}
