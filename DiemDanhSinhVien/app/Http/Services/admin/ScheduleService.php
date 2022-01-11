<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScheduleService
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
            $tuanbd = $request->input('tuanbd');
            $tuankt = $request->input('tuankt');
            //$ngay = $request->input('ngay');
            $thu = $request->input('thu');
            $buoi = $request->input('buoi');
            $maphong = $request->input('maphong');

            $ngay  = $request->input('ngay');

            for ($i = $tuanbd; $i <= $tuankt; $i++) {
                DB::table('cahoc_giangvien_monhoc')->insert([
                    'mahp_id' => $request->input('mahp'),
                    'macahoc_id' => $request->input('macahoc'),
                    'tuan' => $i,
                    'ngay' => $ngay,
                    'thu' => $thu,
                    'buoi' => $buoi,
                    'maphong_id' => $maphong,
                ]);
                // add ngay
                $ngay = date('Y-m-d', strtotime($ngay . " + 7 day"));
            }
            return DB::table('cahoc_giangvien_monhoc')
                ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
                ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
                ->join('cahocs', 'cahocs.macahoc', 'cahoc_giangvien_monhoc.macahoc_id')
                ->join('phonghocs', 'phonghocs.maphong', 'cahoc_giangvien_monhoc.maphong_id')
                ->where('mahp_id', $request->input('mahp'))
                ->where('macahoc_id', $request->input('macahoc'))
                ->where([
                    ['tuan', '>=', $tuanbd],
                    ['tuan', '<=', $tuankt],
                ])
                ->get();
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }

    public function get()
    {
        return DB::table('cahoc_giangvien_monhoc')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('cahocs', 'cahocs.macahoc', 'cahoc_giangvien_monhoc.macahoc_id')
            ->join('phonghocs', 'phonghocs.maphong', 'cahoc_giangvien_monhoc.maphong_id')
            ->get();
    }

    public function getId($mahp, $tuan)
    {
        return DB::table('cahoc_giangvien_monhoc')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('cahocs', 'cahocs.macahoc', 'cahoc_giangvien_monhoc.macahoc_id')
            ->join('phonghocs', 'phonghocs.maphong', 'cahoc_giangvien_monhoc.maphong_id')
            ->where('mahp_id', $mahp)
            ->where('tuan', $tuan)
            ->get();
    }

    public function update($request)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;
        try {
            DB::table('cahoc_giangvien_monhoc')
                ->where('mahp_id', $request->input('mahp'))
                ->where('tuan', $request->input('tuan'))
                ->update([
                    'macahoc_id' =>  $request->input('macahoc'),
                    'ngay' => $request->input('ngay'),
                    'thu' => $request->input('thu'),
                    'buoi' => $request->input('buoi'),
                    'maphong_id' => $request->input('maphong'),
                ]);
            return DB::table('cahoc_giangvien_monhoc')
                ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
                ->join('cahocs', 'cahocs.macahoc', 'cahoc_giangvien_monhoc.macahoc_id')
                ->join('phonghocs', 'phonghocs.maphong', 'cahoc_giangvien_monhoc.maphong_id')
                ->where('mahp_id', $request->input('mahp'))
                ->where('macahoc_id', $request->input('macahoc'))
                ->where('tuan', $request->input('tuan'))
                ->get()[0];
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($mahp, $tuan)
    {
        $lh =  DB::table('cahoc_giangvien_monhoc')
            ->where('mahp_id', $mahp)
            ->where('tuan', $tuan)
            ->delete();
        return $lh;
    }

    // Filter
    public function LayHP($request)
    {
        $khoa = $request->input('khoa');
        $namhoc = $request->input('namhoc');
        $hocky = $request->input('hocky');
        if ($khoa == "All") $khoa = "";
        if ($namhoc == "All") $namhoc = "";
        if ($hocky == "All") $hocky = "";

        return DB::table('cahoc_giangvien_monhoc')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
            ->join('cahocs', 'cahocs.macahoc', 'cahoc_giangvien_monhoc.macahoc_id')
            ->join('phonghocs', 'phonghocs.maphong', 'cahoc_giangvien_monhoc.maphong_id')
            ->where('makhoa', 'like', '%' . $khoa . '%')
            ->where('namhoc_id', 'like', '%' . $namhoc . '%')
            ->where('hocky_id', 'like', '%' . $hocky . '%')
            ->get();
    }
}
