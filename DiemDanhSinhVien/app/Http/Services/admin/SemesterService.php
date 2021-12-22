<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SemesterService
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
            DB::table('hockys')->insert([
                'namhoc' => $request->input('namhoc'),
                'hocky' => $request->input('hocky'),
                'thoigianbd' => $request->input('ngaybd'),
                'thoigiankt' => $request->input('ngaykt')
            ]);
            return DB::table('hockys')
                ->where('namhoc', $request->input('namhoc'))
                ->where('hocky', $request->input('hocky'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('hockys')
            ->get();
    }

    public function getYear()
    {
        return DB::table('hockys')
            ->select('namhoc')
            ->distinct()->get();
    }

    public function getSemester()
    {
        return DB::table('hockys')
            ->select('hocky')
            ->distinct()->get();
    }
    public function getSemesterID($namhoc)
    {
        return DB::table('hockys')->where('namhoc', $namhoc)->select('hocky')->distinct()->get();
    }


    public function getId($namhoc, $hocky)
    {
        return DB::table('hockys')
            ->where('namhoc', $namhoc)->where('hocky', $hocky)->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('hockys')
                ->where('namhoc', $request->input('namhoc'))
                ->where('hocky', $request->input('hocky'))
                ->update([
                    'thoigianbd' => $request->input('ngaybd'),
                    'thoigiankt' => $request->input('ngaykt')
                ]);
            return DB::table('hockys')
                ->where('namhoc', $request->input('namhoc'))
                ->where('hocky', $request->input('hocky'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($namhoc, $hocky)
    {
        $hk = DB::table('hockys')->where('namhoc', $namhoc)->where('hocky', $hocky)->delete();
        return $hk;
    }
}
