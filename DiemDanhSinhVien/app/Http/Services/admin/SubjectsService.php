<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubjectsService
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
            DB::table('monhocs')->insert([
                'mamh' => $request->input('mamh'),
                'tenmh' => $request->input('tenmh'),
                'ghichu' => $request->input('ghichu'),
                'loai' => $request->input('loai'),
                'sotinchi' => $request->input('stc'),
                'makhoa_id' => $request->input('makhoa'),
            ]);
            return DB::table('monhocs')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('mamh', $request->input('mamh'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('monhocs')
            ->join('khoas', 'monhocs.makhoa_id', 'khoas.makhoa')
            ->get();
    }

    public function getId($mamh)
    {
        return DB::table('monhocs')
            ->join('khoas', 'monhocs.makhoa_id', 'khoas.makhoa')
            ->where('mamh', $mamh)->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('monhocs')->where('mamh', $request->input('mamh'))->update([
                'tenmh' => $request->input('tenmh'),
                'ghichu' => $request->input('ghichu'),
                'loai' => $request->input('loai'),
                'sotinchi' => $request->input('stc'),
                'makhoa_id' => $request->input('makhoa'),
            ]);
            return DB::table('monhocs')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('mamh', $request->input('mamh'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($mamh)
    {
        $mh = DB::table('monhocs')->where('mamh', $mamh)->delete();
        return $mh;
    }
}
