<?php

namespace App\Http\Services\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LessonService
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
            DB::table('cahocs')->insert([
                'macahoc' => $request->input('macahoc'),
                'thoigianbd' => $request->input('tgbd'),
                'thoigiankt' => $request->input('tgkt'),
                'tietbd' => $request->input('tietbd'),
                'tietkt' => $request->input('tietkt')
            ]);
            return DB::table('cahocs')->where('macahoc', $request->input('macahoc'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('cahocs')->get();
    }
    public function getId($macahoc)
    {
        return DB::table('cahocs')->where('macahoc', $macahoc)->get();
    }

    public function update($request)
    {

        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('cahocs')
                ->where('macahoc', $request->input('macahoc'))
                ->update([
                    'thoigianbd' => $request->input('tgbd'),
                    'thoigiankt' => $request->input('tgkt'),
                    'tietbd' => $request->input('tietbd'),
                    'tietkt' => $request->input('tietkt')
                ]);
            return DB::table('cahocs')->where('macahoc', $request->input('macahoc'))->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($macahoc)
    {
        $phong = DB::table('cahocs')->where('macahoc', $macahoc)->delete();
        return $phong;
    }
}
