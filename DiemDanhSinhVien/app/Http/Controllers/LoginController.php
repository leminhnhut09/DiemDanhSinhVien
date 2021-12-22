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
            $quyen = $this->loginService->checkAdmin($request);
            if ($quyen[0]->name == 1)
                return redirect()->route(
                    'teacher.index',
                    [
                        'user' => $request->input('username'),
                        'quyen' => $quyen[0]->name
                    ]
                );
            else if ($quyen[0]->name == 2) {
                return redirect()->route('admin.home');
            } else
                return redirect()->route('student.index', ['user' => $request->input('username')]);
        }
        Session()->flash('error', 'Email hoặc mật khẩu không đúng !');
        return redirect()->back();
    }
}
