<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentMService
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
            DB::table('sinhviens')->insert([
                'masv' => $request->input('masv'),
                'tensv' => $request->input('tensv'),
                'gioitinh' => $isMale,
                'ngaysinh' => $request->input('ngaysinh'),
                'diachi' => $request->input('diachi'),
                'sdt' => $request->input('sdt'),
                'anh' => $request->input('anh'),
                'malop_id' => $request->input('malop'),
            ]);
            return DB::table('sinhviens')
                ->where('masv', $request->input('masv'))
                ->join('lops', 'lops.malop', 'sinhviens.malop_id')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('sinhviens')
            ->join('lops', 'sinhviens.malop_id', 'lops.malop')
            ->get();
    }

    public function getId($masv)
    {
        return DB::table('sinhviens')
            ->join('lops', 'sinhviens.malop_id', 'lops.malop')
            ->where('masv', $masv)->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            $isMale = $request->input('gioitinh') == 'Nam' ? 0 : 1;
            DB::table('sinhviens')->where('masv', $request->input('masv'))->update([
                'tensv' => $request->input('tensv'),
                'gioitinh' => $isMale,
                'ngaysinh' => $request->input('ngaysinh'),
                'diachi' => $request->input('diachi'),
                'sdt' => $request->input('sdt'),
                'anh' => $request->input('anh'),
                'malop_id' => $request->input('malop'),
            ]);
            return DB::table('sinhviens')
                ->where('masv', $request->input('masv'))
                ->join('lops', 'lops.malop', 'sinhviens.malop_id')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($masv)
    {
        $sv = DB::table('sinhviens')->where('masv', $masv)->delete();
        return $sv;
    }
}
