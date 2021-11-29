<?php

namespace App\Http\Services;

use App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeacherService
{

    public function layThongTin($request)
    {
        $user = $request->input('user');
        $infoPerson = DB::table('sinhviens')
            ->join('lops', 'lops.malop', 'sinhviens.malop_id')
            ->join('khoas', 'khoas.makhoa', 'lops.makhoa_id')
            ->where('sinhviens.masv', $user)
            ->select('masv', 'tensv', 'gioitinh', 'ngaysinh', 'diachi', 'malop', 'tenkhoa', 'anh')
            ->get();
        return $infoPerson;
    }

    public function layLichDay($request)
    {
        $user = $request->input('user');
        $firstWeek =  date("Y-m-d", strtotime('monday this week'));
        $lastWeek = date("Y-m-d", strtotime('sunday this week'));


        $listHP = DB::table('giangvien_monhoc_sinhvien')
            ->where('masv_id', $user)
            ->select('mahp_id')
            ->get();

        $list = [];
        foreach ($listHP as $hp) {
            array_push($list, $hp->mahp_id);
        }

        $lichHoc = DB::table('giangvien_monhoc')
            ->join('cahoc_giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
            ->join('cahocs', 'cahoc_giangvien_monhoc.macahoc_id', 'cahocs.macahoc')
            ->whereIn('giangvien_monhoc.mahp', $list)
            ->where('ngay', '>=', $firstWeek)
            ->where('ngay', '<=', $lastWeek)
            ->select('giangvien_monhoc.*', 'cahoc_giangvien_monhoc.*', 'cahocs.*')
            ->get();

        return $lichHoc;
    }

    public function update($request)
    {
        try {
            $date = date('Y-m-d');
            if ($request->input('arrMSSV') != null) {
                $tuan = DB::table('cahoc_giangvien_monhoc')
                    ->where('mahp_id', 6)
                    ->where('ngay', $date)
                    ->select('tuan')
                    ->get();
                DB::table('giangvien_monhoc_sinhvien')
                    ->where('masv_id', 2001180153)
                    ->where('mahp_id', 6)
                    ->update(['tuan' . $tuan[0]->tuan => 1]);
            }
            return true;
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            return false;
        }
    }
}
