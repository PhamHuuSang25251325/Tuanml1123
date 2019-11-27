<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $user = $request->only('email', 'password');
        if (\Auth::attempt($user)) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['Email đăng nhập hoặc mật khẩu không đúng', 'Message']);
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('home');
        
    }
}
