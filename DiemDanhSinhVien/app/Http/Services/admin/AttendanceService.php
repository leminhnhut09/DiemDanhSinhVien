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
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
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

    public function storeXLSX($request)
    {
        //dd($request->all());
        // $isValidPrice = $this->isValidPrice($request);
        //if ($isValidPrice == false) return false;
        try {
            $arrList = $request->input('arr');
            // dd($arrList[0]['M?? h???c ph???n']);
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

    public function get()
    {
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
            ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->get();
    }

    public function getId($mahp, $masv)
    {
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
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


    public function LayHPTheoNam($request)
    {
        $namhoc = $request->input('namhoc');
        $hocky = $request->input('hocky');
        $khoa = $request->input('khoa');
        if ($hocky == null && $khoa == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('namhoc_id', $namhoc)->get();
        } else if ($hocky != null && $khoa == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('hocky_id', $hocky)
                ->where('namhoc_id', $namhoc)->get();
        } else if ($hocky == null && $khoa != null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('makhoa', $khoa)
                ->where('namhoc_id', $namhoc)->get();
        } else {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('hocky_id', $hocky)
                ->where('makhoa', $khoa)
                ->where('namhoc_id', $namhoc)->get();
        }
    }

    public function LayHPTheoHocKy($request)
    {
        $hocky = $request->input('hocky');
        $khoa = $request->input('khoa');
        $namhoc = $request->input('namhoc');
        if ($khoa == null && $namhoc == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('hocky_id', $hocky)->get();
        } else if ($khoa != null && $namhoc == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('makhoa', $khoa)
                ->where('hocky_id', $hocky)->get();
        } else if ($khoa == null && $namhoc != null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('namhoc_id', $namhoc)
                ->where('hocky_id', $hocky)->get();
        } else {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('namhoc_id', $namhoc)
                ->where('makhoa', $khoa)
                ->where('hocky_id', $hocky)->get();
        }
    }

    public function LayHPTheoKhoa($request)
    {
        $khoa = $request->input('khoa');
        $namhoc = $request->input('namhoc');
        $hocky = $request->input('hocky');
        if ($namhoc == null && $hocky == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('makhoa', $khoa)->get();
        } else if ($namhoc != null && $hocky == null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('namhoc_id', $namhoc)
                ->where('makhoa', $khoa)->get();
        } else if ($namhoc == null && $hocky != null) {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('hocky_id', $hocky)
                ->where('makhoa', $khoa)->get();
        } else {
            return DB::table('giangvien_monhoc')
                ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
                ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
                ->where('namhoc_id', $namhoc)
                ->where('hocky_id', $hocky)
                ->where('makhoa', $khoa)->get();
        }
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
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
            ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
            ->join('sinhviens', 'sinhviens.masv', 'giangvien_monhoc_sinhvien.masv_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->where('makhoa', 'like',  '%' . $khoa . '%')
            ->where('namhoc_id', 'like', '%' . $namhoc . '%')
            ->where('hocky_id', 'like', '%' . $hocky . '%')
            ->get();
    }
}
