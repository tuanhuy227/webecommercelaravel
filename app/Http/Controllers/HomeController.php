<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{
    public function index(){
    $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id', 'desc')->get();
     $all_product= DB::table('tbl_product')->orderby('product_id','desc')->limit(4)->get();   
    return view('pages.home')
    ->with('category',$cate_product)->with('brand',$brand_product)
    ->with('all_product',$all_product);
}
}