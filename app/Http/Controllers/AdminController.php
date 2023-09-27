<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
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
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {    $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('admin');
        }
    }
    public function log_out()
    {   $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('admin');
    }
}
