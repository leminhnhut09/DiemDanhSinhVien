<?php

namespace App\Http\Services\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomService
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
            DB::table('phonghocs')->insert([
                'maphong' => $request->input('maphong'),
                'tenphong' => $request->input('tenphong'),
                'succhua' => $request->input('succhua')
            ]);
            return DB::table('phonghocs')->where('maphong', $request->input('maphong'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('phonghocs')->get();
    }
    public function getId($maphong)
    {
        return DB::table('phonghocs')->where('maphong', $maphong)->get();
    }

    public function update($request)
    {

        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('phonghocs')
                ->where('maphong', $request->input('maphong'))
                ->update([
                    'tenphong' => $request->input('tenphong'),
                    'succhua' => $request->input('succhua')
                ]);
            return DB::table('phonghocs')->where('maphong', $request->input('maphong'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($maphong)
    {
        $phong = DB::table('phonghocs')->where('maphong', $maphong)->delete();
        return $phong;
    }
}
