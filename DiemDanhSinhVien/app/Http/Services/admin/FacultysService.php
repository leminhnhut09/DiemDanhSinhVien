<?php

namespace App\Http\Services\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FacultysService
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
            $khoas = (object) [
                'makhoa' => $request->input('makhoa'),
                'tenkhoa' => $request->input('tenkhoa'),
                'ngaythanhlap' => $request->input('ngaythanhlap'),
            ];
            $isSuccess = DB::table('khoas')->insert([
                'makhoa' => $khoas->makhoa,
                'tenkhoa' => $khoas->tenkhoa,
                'ngaythanhlap' => $khoas->ngaythanhlap,
            ]);
            //$isSuccess = Khoa::create($request->all());
            return $khoas;
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        // return Product::with('menu')->orderByDesc('id')->paginate(15);
        //return Khoa::paginate(15);
        return DB::table('khoas')->orderByDesc('ngaythanhlap')->get();
    }
    public function getId($makhoa)
    {
        //$khoa = DB::table('khoas')->where('makhoa', '', 'CNTT')->get();
        return DB::table('khoas')->where('makhoa', $makhoa)->get();
    }

    public function update($request)
    {

        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            $khoas = (object) [
                'makhoa' => $request->input('makhoa'),
                'tenkhoa' => $request->input('tenkhoa'),
                'ngaythanhlap' => $request->input('ngaythanhlap'),
            ];
            DB::table('khoas')->where('makhoa', $khoas->makhoa)->update([
                'tenkhoa' => $khoas->tenkhoa,
                'ngaythanhlap' => $khoas->ngaythanhlap,
            ]);
            return $khoas;
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($makhoa)
    {
        $khoa = DB::table('khoas')->where('makhoa', $makhoa)->delete();
        return $khoa;
    }
}
