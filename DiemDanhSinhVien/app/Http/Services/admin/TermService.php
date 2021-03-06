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

    // Excel
    public function storeXLSX($request)
    {
        try {
            $arrList = $request->input('arr');
            // dd($arrList[0]['M?? h???c ph???n']);
            $len = count($arrList);
            $arrResult = [];
            for ($i = 0; $i < $len; $i++) {
                // Table l???p h???c ph???n
                DB::table('giangvien_monhoc')->insert([
                    'mahp' => $arrList[$i]['M?? h???c ph???n'],
                    'magv_id' => $arrList[$i]['M?? gi???ng vi??n'],
                    'mamh_id' => $arrList[$i]['M?? m??n h???c'],
                    'namhoc_id' => $arrList[$i]['N??m h???c'],
                    'hocky_id' => $arrList[$i]['H???c k???']
                ]);
                $item = DB::table('giangvien_monhoc')
                    ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
                    ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
                    ->where('mahp', $arrList[$i]['M?? h???c ph???n'])
                    ->get()[0];
                array_push($arrResult, $item);
                // table ca h???c
                $tuanbd = $arrList[$i]['Tu???n b???t ?????u'];
                $tuankt = $arrList[$i]['Tu???n k???t th??c'];
                $ngay  = $arrList[$i]['Ng??y'];
                if ($tuanbd > $tuankt) continue;
                for ($a = $tuanbd; $a <= $tuankt; $a++) {
                    DB::table('cahoc_giangvien_monhoc')->insert([
                        'mahp_id' => $arrList[$i]['M?? h???c ph???n'],
                        'macahoc_id' => $arrList[$i]['M?? ca h???c'],
                        'tuan' => $a,
                        'ngay' => $ngay,
                        'thu' => $arrList[$i]['Th???'],
                        'buoi' => $arrList[$i]['Bu???i'],
                        'maphong_id' => $arrList[$i]['M?? ph??ng']
                    ]);
                    $ngay = date('Y-m-d', strtotime($ngay . " + 7 day"));
                }
            }
            return $arrResult;
        } catch (\Exception $err) {
            Log::info($err->getMessage());
        }
        return null;
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
        return DB::table('giangvien_monhoc')
            ->join('monhocs', 'giangvien_monhoc.mamh_id', 'monhocs.mamh')
            ->join('khoas', 'khoas.makhoa', 'monhocs.makhoa_id')
            ->join('giangviens', 'giangvien_monhoc.magv_id', 'giangviens.magv')
            ->where('makhoa', 'like', '%' . $khoa . '%')
            ->where('namhoc_id', 'like', '%' . $namhoc . '%')
            ->where('hocky_id', 'like', '%' . $hocky . '%')
            ->get();
    }
}
