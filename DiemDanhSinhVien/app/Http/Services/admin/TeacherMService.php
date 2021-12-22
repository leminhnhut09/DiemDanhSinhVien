<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeacherMService
{
    // public function isValidPrice($request)
    // {
    // $price = $request->input('price');
    // $price_sale = $request->input('price_sale');
    // if ($price != 0 && $price_sale != 0 && $price_sale > $price) {
    // Session()->flash('error', "Vui long nhap gia giam lon nho gia goc");
    // return false;
    // }
    // if ($price == 0 && $price_sale != 0) {
    // Session()->flash('error', "Vui long nhap gia gia goc");
    // return;
    // }
    // return true;
    // }
    public function store($request)
    {
        //dd($request->all());
        // $isValidPrice = $this->isValidPrice($request);
        //if ($isValidPrice == false) return false;

        try {
            $isMale = $request->input('gioitinh') == 'Nam' ? 0 : 1;
            DB::table('giangviens')->insert([
                'magv' => $request->input('magv'),
                'tengv' => $request->input('tengv'),
                'gioitinh' => $isMale,
                'ngaysinh' => $request->input('ngaysinh'),
                'diachi' => $request->input('diachi'),
                'sdt' => $request->input('sdt'),
                'anh' => $request->input('anh'),
                'makhoa_id' => $request->input('makhoa'),
            ]);
            return DB::table('giangviens')
                ->where('magv', $request->input('magv'))
                ->join('khoas', 'giangviens.makhoa_id', 'khoas.makhoa')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('giangviens')
            ->join('khoas', 'giangviens.makhoa_id', 'khoas.makhoa')
            ->get();
    }

    public function getId($magv)
    {
        return DB::table('giangviens')
            ->join('khoas', 'giangviens.makhoa_id', 'khoas.makhoa')
            ->where('magv', $magv)->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            $isMale = $request->input('gioitinh') == 'Nam' ? 0 : 1;
            DB::table('giangviens')->where('magv', $request->input('magv'))->update([
                'tengv' => $request->input('tengv'),
                'gioitinh' => $isMale,
                'ngaysinh' => $request->input('ngaysinh'),
                'diachi' => $request->input('diachi'),
                'sdt' => $request->input('sdt'),
                'anh' => $request->input('anh'),
                'makhoa_id' => $request->input('makhoa')
            ]);
            return DB::table('giangviens')
                ->where('magv', $request->input('magv'))
                ->join('khoas', 'giangviens.makhoa_id', 'khoas.makhoa')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($magv)
    {
        $gv = DB::table('giangviens')->where('magv', $magv)->delete();
        return $gv;
    }
}
