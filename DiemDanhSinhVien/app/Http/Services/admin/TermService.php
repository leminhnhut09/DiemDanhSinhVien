<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TermService
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
            DB::table('giangvien_monhoc')->insert([
                'mahp' => $request->input('mahp'),
                'mamh_id' => $request->input('mamh'),
                'magv_id' => $request->input('magv'),
                'namhoc_id' => $request->input('namhoc'),
                'hocky_id' => $request->input('hocky'),
            ]);
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->where('mahp', $request->input('mahp'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('giangvien_monhoc')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
            ->get();
        // return DB::table('giangvien_monhoc')
        //     ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
        //     ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
        //     ->join('hockys', function ($join) {
        //         $join->on('hockys.namhoc', '=', 'giangvien_monhoc.namhoc_id')
        //             ->on('hockys.hocky', '=', 'giangvien_monhoc.hocky_id');
        //     })
        //     ->get();
    }

    public function getId($mahp)
    {
        return DB::table('giangvien_monhoc')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
            ->where('mahp', $mahp)
            ->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('giangvien_monhoc')
                ->where('mahp', $request->input('mahp'))
                ->update([
                    'mamh_id' => $request->input('mamh'),
                    'magv_id' => $request->input('magv'),
                    'namhoc_id' => $request->input('namhoc'),
                    'hocky_id' => $request->input('hocky'),
                ]);
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->where('mahp', $request->input('mahp'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($mahp)
    {
        $sv = DB::table('giangvien_monhoc')->where('mahp', $mahp)->delete();
        return $sv;
    }
}
