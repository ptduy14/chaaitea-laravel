<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountUpdateFormRequest;
use Illuminate\Support\Facades\File;


class AccountController extends Controller
{
    public function index() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        $user = Auth::user();
        $address = explode(', ', $user->address, 4);
       
        return view('main.auth-customer.account', compact('category', 'products', 'user', 'address'));
    }

    public function updateAccount(AccountUpdateFormRequest $request) {
        $request->validated();

        $user = Auth::user();

        // check file upload

        if ($request->hasFile('img-upload')) {
            $avata =  $request->file('img-upload')->getClientOriginalName();
        } else {
            if ($user->avata) {
                $avata = $user->avata;
            } else {
                $avata = null;
            }
        }
        
        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('city').', '.$request->input('district').', '.$request->input('ward').', '.$request->input('street_name'),
            'gender' => $request->input('gender'),
            'avata' =>  $avata
        ]);

        // update lại hình trong local

        if ($request->hasFile('img-upload')) {
            $old_file = 'upload/images/customer-avata/'.$user->avata;

            if (File::exists($old_file)) {
                File::delete($old_file);
            } 
            $request->file('img-upload')->move('upload/images/customer-avata', $request->file('img-upload')->getClientOriginalName());
        }

        $toast_msg = 'tài khoản đã được cập nhật';
        $toast_modify = 'toast-success';
        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
    }

    public function ChangePasswordAccount(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        // khi sử dụng attemp thì lúc nào cũng phải mặc định có 2 tham số là email và password
        if (Auth::attempt(['email' => Auth::user()->email , 'password' => $request->input('old_password')])) {
            Auth::user()->update([
                'password' => bcrypt($request->input('password')),
            ]);

            $toast_msg = 'mật khẩu đã được cập nhật';
            $toast_modify = 'toast-success';
            return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
        } else {
            $toast_msg = 'mật khẩu không chính xác vui lòng thử lại sau';
            $toast_modify = 'toast-error';
            return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
        }
    }
}
