<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManageAccAdminController extends Controller
{
    public function indexAdmin() {
        $admins = User::where('role', 1)->get();

        return view('admin.account-admin.index', compact('admins'));
    }

    public function handleSearchAdmin($type, $content) {
        switch ($type) {
            case 'tên admin':
                $admins = User::where('name', 'like', '%' . $content . '%')->where('role', 1)->get();
                break;
            
            default:
                # code...
                break;
        }
    
        return view('admin.account-admin.admin-table', compact('admins'));
    }

    public function indexCreateNewAdmin() {
        return view('admin.account-admin.create');
    }

    public function storeCreateNewAddmin(Request $request) {
        $validated = $request->validate([
            'admin_name' => 'required',
            'user_name' => 'required | unique:table_user,email',
            'admin_phone' => 'required|numeric|digits:10',
            'password' => 'required|confirmed',
        ]);

        $admin = User::create([
            'name' => $request->input('admin_name'),
            'email' => $request->input('user_name'),
            'phone' => $request->input('admin_phone'),
            'password'  => bcrypt($request->input('password')),
            'role' => 1
        ]);

        $admin->save();
        return redirect('/admin/admin')->with('toast_msg', 'Admin mới đã được thêm thành công');
    }

    public function indexEditAdmin(Request $request) {
        $admin = User::find($request->input('admin_id')); 

        return view('admin.account-admin.edit', compact('admin'));
    }

    public function updateAdmin(Request $request) {
        User::where('id', $request->input('admin_id'))->update(['verify' => $request->input('verify')]);
        
        return redirect('/admin/admin')->with('toast_msg', 'Cập nhật thành công');
    }

    public function deleteAdmin(Request $request) {
        User::where('id', $request->input('admin_id'))->delete();

        return redirect('/admin/admin')->with('toast_msg', 'Admin đã được xóa thành công');
    }   
}
