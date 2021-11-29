<?php

namespace App\Http\Services;

use App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LoginService
{
    public function checkAdmin($request)
    {
        $quyen = DB::table('users')->where('email', $request->input('username'))->select('name')->get();
        return $quyen;
    }
}
