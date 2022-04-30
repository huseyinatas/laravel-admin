<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $mail = $request->post('email');
        $password = $request->post('password');
        $mail = admin_mail_control($mail);
        if (isset($mail) && Auth::attempt(['email' => $mail, 'password' => $password])) {
            return redirect()->intended('admin');
        }
        return back()->withErrors(['msg' => 'E-Mail veya şifreniz yanlış gibi görünüyor...']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function forgot(){
        return view('admin.forgot-password');
    }
}
