<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function indexLoginForm() {
        return view('admin.auth-admin.login');
    }

    public function handleLogin(Request $request) {

        $validated = $request->validate([
            'username' => 'required | not_regex:/@gmail\.com$/',
            'password' => 'required'
        ]);

        $email = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember-me') ? true : false;

        // Auth::attempt luôn yêu cầu một password hash
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            if (Auth::user()->verify == false) {
                $toast_msg = 'login information is incorrect, please try again or contact your administrator';
                $toast_modify = 'danger';
                Auth::logout();

                return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
            }
            return redirect('/admin')->with('toast_msg', 'Welcome !!');
        }

        $toast_msg = 'login information is incorrect, please try again or contact your administrator';
        $toast_modify = 'danger';

        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
    }

    public function handleLogout() {
        Auth::logout();

        $toast_msg = 'you are logged out, if you want to access please login again';
        $toast_modify = 'success';

        return redirect('/admin/login')->with(compact('toast_msg', 'toast_modify'));
    }

    
}
