<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClassService
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
        try {
            DB::table('lops')->insert([
                'malop' => $request->input('malop'),
                'tenlop' => $request->input('tenlop'),
                'makhoa_id' => $request->input('makhoa')
            ]);
            return DB::table('lops')
                ->where('malop', $request->input('malop'))
                ->join('khoas', 'khoas.makhoa', 'lops.makhoa_id')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('lops')
            ->join('khoas', 'khoas.makhoa', 'lops.makhoa_id')
            ->get();
    }

    public function getId($malop)
    {
        return DB::table('lops')
            ->join('khoas', 'khoas.makhoa', 'lops.makhoa_id')
            ->where('malop', $malop)->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('lops')->where('malop', $request->input('malop'))->update([
                'tenlop' => $request->input('tenlop'),
                'makhoa_id' => $request->input('makhoa')
            ]);
            return DB::table('lops')
                ->where('malop', $request->input('malop'))
                ->join('khoas', 'khoas.makhoa', 'lops.makhoa_id')
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($malop)
    {
        $lop = DB::table('lops')->where('malop', $malop)->delete();
        return $lop;
    }
}
