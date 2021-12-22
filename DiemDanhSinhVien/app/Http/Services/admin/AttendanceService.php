<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendanceService
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
            DB::table('giangvien_monhoc_sinhvien')->insert([
                'masv_id' => $request->input('masv'),
                'mahp_id' => $request->input('mahp'),
                'tuan1' => $request->input('tuan1'),
                'tuan2' => $request->input('tuan2'),
                'tuan3' => $request->input('tuan3'),
                'tuan4'  => $request->input('tuan4'),
                'tuan5' => $request->input('tuan5'),
                'tuan6' => $request->input('tuan6'),
                'tuan7' => $request->input('tuan7'),
                'tuan8' => $request->input('tuan8'),
                'tuan9' => $request->input('tuan9'),
                'tuan10' => $request->input('tuan10'),
                'tuan11' => $request->input('tuan11'),
                'tuan12' => $request->input('tuan12'),
                'tuan13' => $request->input('tuan13'),
                'tuan14' => $request->input('tuan14'),
                'tuan15' => $request->input('tuan15'),
                'tuan16' => $request->input('tuan16'),
                'tuan17' => $request->input('tuan17'),
                'tuan18' => $request->input('tuan18'),
                'tuan19' => $request->input('tuan19'),
                'tuan20' => $request->input('tuan20'),
            ]);
            return DB::table('giangvien_monhoc_sinhvien')
                ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
                ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
                ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
                ->where('mahp_id', $request->input('mahp'))
                ->where('masv_id', $request->input('masv'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->get();
    }

    public function getId($mahp, $masv)
    {
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->where('mahp_id', $mahp)
            ->where('masv_id', $masv)
            ->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('giangvien_monhoc_sinhvien')
                ->where('mahp_id',  $request->input('mahp'))
                ->where('masv_id', $request->input('masv'))
                ->update([
                    'tuan1' => $request->input('tuan1'),
                    'tuan2' => $request->input('tuan2'),
                    'tuan3' => $request->input('tuan3'),
                    'tuan4'  => $request->input('tuan4'),
                    'tuan5' => $request->input('tuan5'),
                    'tuan6' => $request->input('tuan6'),
                    'tuan7' => $request->input('tuan7'),
                    'tuan8' => $request->input('tuan8'),
                    'tuan9' => $request->input('tuan9'),
                    'tuan10' => $request->input('tuan10'),
                    'tuan11' => $request->input('tuan11'),
                    'tuan12' => $request->input('tuan12'),
                    'tuan13' => $request->input('tuan13'),
                    'tuan14' => $request->input('tuan14'),
                    'tuan15' => $request->input('tuan15'),
                    'tuan16' => $request->input('tuan16'),
                    'tuan17' => $request->input('tuan17'),
                    'tuan18' => $request->input('tuan18'),
                    'tuan19' => $request->input('tuan19'),
                    'tuan20' => $request->input('tuan20'),
                ]);
            return DB::table('giangvien_monhoc_sinhvien')
                ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
                ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
                ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
                ->where('mahp_id', $request->input('mahp'))
                ->where('masv_id', $request->input('masv'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($mahp, $masv)
    {
        $dd =  DB::table('giangvien_monhoc_sinhvien')
            ->where('mahp_id', $mahp)
            ->where('masv_id', $masv)
            ->delete();
        return $dd;
    }
}
