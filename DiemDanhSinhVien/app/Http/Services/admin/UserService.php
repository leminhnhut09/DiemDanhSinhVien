<?php

namespace App\Http\Services\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class UserService
{

    public function store($request)
    {
        try {
            DB::table('users')->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
            return DB::table('users')->where('email', $request->input('email'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        // return DB::table('users')->get();
        $list = DB::table('users')->get();
        $arr = [];
        foreach ($list as $item) {
            $decrypt = Crypt::encrypt('123456');
            dd($decrypt);
            // $item['password'] = $decrypt;
            // array_push($arr, $item);
        }
        return $list;
    }
    public function getId($username)
    {
        return DB::table('users')->where('name', $username)->get();
    }

    public function update($request)
    {
        try {
            DB::table('users')
                ->where('email', $request->input('email'))
                ->update([
                    'name' => $request->input('name'),
                    'password' => $request->input('password')
                ]);
            return DB::table('users')->where('email', $request->input('email'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($email)
    {
        $khoa = DB::table('users')->where('email', $email)->delete();
        return $khoa;
    }
}
