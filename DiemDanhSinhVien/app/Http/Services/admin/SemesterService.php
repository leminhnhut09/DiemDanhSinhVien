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

    // import excel

    public function storeXLSX($request)
    {
        try {
            $arrList = $request->input('arr');
            $len = count($arrList);
            $arrResult = [];
            for ($i = 0; $i < $len; $i++) {
                DB::table('giangvien_monhoc_sinhvien')->insert([
                    'masv_id' => $arrList[$i]['M?? sinh vi??n'],
                    'mahp_id' => $arrList[$i]['M?? h???c ph???n'],
                    'tuan1' => array_key_exists('Tu???n 1', $arrList[$i]) == true ? $arrList[$i]['Tu???n 1'] : 'false',
                    'tuan2' => array_key_exists('Tu???n 2', $arrList[$i]) == true ? $arrList[$i]['Tu???n 2'] : 'false',
                    'tuan3' => array_key_exists('Tu???n 3', $arrList[$i]) == true ? $arrList[$i]['Tu???n 3'] : 'false',
                    'tuan4'  => array_key_exists('Tu???n 4', $arrList[$i]) == true ? $arrList[$i]['Tu???n 4'] : 'false',
                    'tuan5' => array_key_exists('Tu???n 5', $arrList[$i]) == true ? $arrList[$i]['Tu???n 5'] : 'false',
                    'tuan6' => array_key_exists('Tu???n 6', $arrList[$i]) == true ? $arrList[$i]['Tu???n 6'] : 'false',
                    'tuan7' => array_key_exists('Tu???n 7', $arrList[$i]) == true ? $arrList[$i]['Tu???n 7'] : 'false',
                    'tuan8' => array_key_exists('Tu???n 8', $arrList[$i]) == true ? $arrList[$i]['Tu???n 8'] : 'false',
                    'tuan9' => array_key_exists('Tu???n 9', $arrList[$i]) == true ? $arrList[$i]['Tu???n 9'] : 'false',
                    'tuan10' => array_key_exists('Tu???n 10', $arrList[$i]) == true ? $arrList[$i]['Tu???n 10'] : 'false',
                    'tuan11' => array_key_exists('Tu???n 11', $arrList[$i]) == true ? $arrList[$i]['Tu???n 11'] : 'false',
                    'tuan12' => array_key_exists('Tu???n 12', $arrList[$i]) == true ? $arrList[$i]['Tu???n 12'] : 'false',
                    'tuan13' => array_key_exists('Tu???n 13', $arrList[$i]) == true ? $arrList[$i]['Tu???n 13'] : 'false',
                    'tuan14' => array_key_exists('Tu???n 14', $arrList[$i]) == true ? $arrList[$i]['Tu???n 14'] : 'false',
                    'tuan15' => array_key_exists('Tu???n 15', $arrList[$i]) == true ? $arrList[$i]['Tu???n 15'] : 'false',
                    'tuan16' => array_key_exists('Tu???n 16', $arrList[$i]) == true ? $arrList[$i]['Tu???n 16'] : 'false',
                    'tuan17' => array_key_exists('Tu???n 17', $arrList[$i]) == true ? $arrList[$i]['Tu???n 17'] : 'false',
                    'tuan18' => array_key_exists('Tu???n 18', $arrList[$i]) == true ? $arrList[$i]['Tu???n 18'] : 'false',
                    'tuan19' => array_key_exists('Tu???n 19', $arrList[$i]) == true ? $arrList[$i]['Tu???n 19'] : 'false',
                    'tuan20' => array_key_exists('Tu???n 20', $arrList[$i]) == true ? $arrList[$i]['Tu???n 20'] : 'false',
                ]);


                $item = DB::table('giangvien_monhoc_sinhvien')
                    ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
                    ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                    ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
                    ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
                    ->where('masv_id', $arrList[$i]['M?? sinh vi??n'])
                    ->where('mahp_id', $arrList[$i]['M?? h???c ph???n'])
                    ->get()[0];
                array_push($arrResult, $item);
            }
            return $arrResult;
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
    }
}
