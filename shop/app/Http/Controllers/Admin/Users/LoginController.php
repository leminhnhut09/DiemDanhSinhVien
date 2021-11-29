<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Login System'
        ]);
    }

    public function store(Request $request)
    {
        // Kiểm tra dữ liệu lấy từ form login
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            // Đăng nhập thành công
            return redirect()->route('admin');
        }
        // Đăng nhập thất bại
        Session()->flash('error', 'Email hoặc mật khẩu không đúng !');
        return redirect()->back();
    }
}
