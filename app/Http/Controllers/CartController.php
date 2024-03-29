<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request){
          
    $productId = $request->productid_hidden;
    $quantity =$request->quantity;
    $product_info  =  DB::table('tbl_product')->where('product_id',$productId)->first();
    
    $data['id']=$product_info->product_id; 
    $data['qty']=$quantity;
    $data['name']=$product_info->product_name; 
    $data['price']=$product_info->product_price; 
    $data['options ']['image']=$product_info->product_image; 
    $data['weight']=$product_info->product_price; 
    Cart::add($data);
    
     return  Redirect::to('/show_cart');
    }
    public function show_cart(){

    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return  Redirect::to('/show_cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);
        return  Redirect::to('/show_cart');

    }
}
