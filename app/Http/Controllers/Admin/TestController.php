<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function register() {
        $user = User::create([
            'name' => 'Phan Tấn Duy',
            'email' => 'phantanduy13@gmail.com',
            'password' => bcrypt('duy123'),
            'verify_token' => Str::random(16)
        ]);

        $user->save();

        dd('ok');
    }
}
