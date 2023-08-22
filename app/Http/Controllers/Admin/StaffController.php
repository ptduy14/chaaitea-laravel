<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function indexStaff() {
        $staffs = User::role('staff')->get();

        return view('admin.staff.index', compact('staffs'));
    }

    public function indexCreateNewStaff() {
        return view('admin.staff.create');
    }

    public function storeCreateNewStaff(Request $request) {
        if ($request->input('password_admin') == '' || !Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('password')])) {
            $toast_msg = 'Mật khẩu admin không đúng';
            $toast_modify = 'danger';
    
            return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
        }

        $validated = $request->validate([
            'staff_name' => 'required',
            'user_name' => 'required | unique:table_user,email',
            'staff_phone' => 'required|numeric|digits:10',
            'password' => 'required|confirmed',
        ]);

        $staff = User::create([
            'name' => $request->input('staff_name'),
            'email' => $request->input('user_name'),
            'phone' => $request->input('staff_phone'),
            'password'  => bcrypt($request->input('password')), 
        ])->assignRole('staff');

        $staff->save();
        return redirect('/admin/staff')->with('toast_msg', 'Nhân viên mới đã được thêm thành công');
    }
}