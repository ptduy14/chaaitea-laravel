<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\AuthCustomerFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyEmail;


class AuthCustomerController extends Controller
{
    public function indexFormRegister() {

        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.auth-customer.register', compact('category', 'products'));
    }

    public function handleFormRegister(AuthCustomerFormRequest $request) {

        $request->validated();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('city').', '.$request->input('district').', '.$request->input('ward').', '.$request->input('street_name'),
            'gender' => $request->input('gender'),
            'password' => bcrypt($request->input('password')),
            'verify_token' => $this->createVerifyToken()
        ])->assignRole('customer');

        $data = 'Bạn đã đăng ký một tài khoản ChaaTea Shop, trước khi có thể sử dụng tài khoản của mình, bạn cần xác minh rằng đây là địa chỉ email của bạn bằng cách nhấp vào nút bên dưới:';

        Mail::to($user)->send(new VerifyEmail($user, $data));

        return redirect()->route('verify.index', ['id' => $user->id]);
    }

    public function createVerifyToken() {
        $verifyToken = Str::random(16);
        return $verifyToken;
    }

    public function indexVerifyAccount ($user_id) {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.auth-customer.verify-index', compact('category', 'products', 'user_id'));
    }

    public function handleVerifyAccount($user_id, $token) {
        $user = User::find($user_id);

        if ($user->verify == false ) {
            if ($user->verify_token === $token) {
                $user->update([
                    'verify' => true,
                    'verify_token ' => null
                ]);
            }

            $toast_msg = 'tài khoản đã xác thực thành công giờ bạn có thể đăng nhập lại';
            $toast_modify = 'toast-success';

            return redirect('/login')->with(compact('toast_msg', 'toast_modify'));
    
        } else {
            
            if ($user->verify_token === $token) {
                $user->update([
                    'verify_token ' => null
                ]);
            }

            return $this->indexForgetPasswordForm($user);
        }
    }


    public function indexFormLogin() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.auth-customer.login', compact('category', 'products'));
    }

    public function handleFormLogin(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $remenber = $request->input('remenber') ? true : false;

        if(Auth::attempt(['email' => $email, 'password' => $password], $remenber)) {
            if (Auth::user()->verify == false) {
                $user_id = Auth::user()->id;
                Auth::logout();
                
                return redirect()->back()->with(compact('user_id'));
            } else {
                $toast_msg = 'xin chào ' . Auth::user()->name;
                $toast_modify = 'toast-success';

                return redirect('')->with(compact('toast_msg', 'toast_modify'));
            }
        }
        
        $toast_msg = 'tài khoản hoặc mật khẩu không đúng';
        $toast_modify = 'toast-error';

        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
        
    }
    
    public function handleReVerifyAccount($id) {
        $user = User::find($id);
        $user->update([
            'verify_token' => $this->createVerifyToken()
        ]);

        $data = 'Bạn đã yêu cầu gửi lại link mail xác thực, đây là link xác thực của bạn, hãy nhấn nút bên dưới để tiếp tục sử dụng các dịch vụ của chúng tôi.';

        Mail::to($user)->send(new VerifyEmail($user, $data));

        return redirect()->route('verify.index', ['id' => $user->id]);
    }

    public function handleLogout() {
        Auth::logout();
        return redirect('');
    }

    public function indexForgetPasswordValidateForm() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.auth-customer.forget-pass', compact('category', 'products'));
    }

    public function handleForgetPasswordValidateForm(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        
        if ($user) {
            $user->update([
                'verify_token' => $this->createVerifyToken()
            ]);

            $data = 'Bạn có phải vừa yêu cầu chức năng quên mật khẩu không ? nếu là bạn hãy nhấn nút bên dưới để tiếp tục dịch vụ. Nếu không phải là bạn vui lòng liên hệ với chúng tôi qua email này';

            Mail::to($user)->send(new VerifyEmail($user, $data));
            
            return redirect()->route('verify.index', ['id' => $user->id]);
        }
    }

    public function indexForgetPasswordForm($user) {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        return view('main.auth-customer.forgetpass', compact('category', 'products', 'user'));
    }

    public function handleForgetPasswordForm(Request $request) {

        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::where('id', $request->input('id'))->update([
            'password' => bcrypt($request->input('password')),
            'verify_token' => null
        ]);

        $toast_msg = 'Mật khẩu thay đổi thành công giờ bạn có thể đăng nhập lại';
        $toast_modify = 'toast-success';

        return redirect('/login')->with(compact('toast_msg', 'toast_modify'));

    }

}
