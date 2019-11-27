<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminAuthController extends Controller
{
    // use AuthenticatesUsers;

    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $admin = $request->only('username', 'password');
        if (\Auth::guard('admins')->attempt($admin)) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->withErrors(['Tên đăng nhập hoặc mật khẩu không đúng', 'Message']);
    }

    public function logout(){
        \Auth::guard('admins')->logout();
        return redirect()->route('admin.get.login');
        
    }
}
