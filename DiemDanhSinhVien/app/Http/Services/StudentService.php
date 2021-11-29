<?php

namespace App\Http\Services;

use App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudentService
{
    public function layLichHoc($request)
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

    public function findAttendance($request)
    {
        $mahp = $request->input('mahp');
        $masv = $request->input('masv');
        $tuan = 'tuan' . $request->input('tuan');
        $rs = DB::table('giangvien_monhoc_sinhvien')
            ->where('mahp_id', $mahp)
            ->where('masv_id', $masv)
            ->select($tuan)
            ->get()[0]->$tuan;
        return $rs;
    }
}
