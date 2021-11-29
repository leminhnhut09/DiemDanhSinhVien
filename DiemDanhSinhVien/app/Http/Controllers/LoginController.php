<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LoginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $loginService;
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('login', ['title' => 'Đăng Nhập']);
    }
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu lấy từ form login
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('username'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            // Đăng nhập thành công
            // Student
            // if ($request->input('username') == "2001180152")
            //     return redirect()->route('student.home', ['user' => $request->input('username')]);
            // // Teacher
            // else
            //     return redirect()->route('teacher.index', ['user' => $request->input('username')]);
            $quyen = $this->loginService->checkAdmin($request);
            if ($quyen[0]->name == 1)
                return redirect()->route('teacher.index', ['user' => $request->input('username')]);
            // Teacher
            else
                return redirect()->route('student.index', ['user' => $request->input('username')]);
        }
        // Đăng nhập thất bại
        Session()->flash('error', 'Email hoặc mật khẩu không đúng !');
        return redirect()->back();
    }
}
