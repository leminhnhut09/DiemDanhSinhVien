<?php

namespace App\Http\Services;

use App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudentService
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

    public function GetListSubject($request)
    {
        $user = $request->input('user');
        $listDetailSubject = DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
            ->where('giangvien_monhoc_sinhvien.masv_id', $user)
            ->get();
        return $listDetailSubject;
    }

    public function GetDateSchedule()
    {
        $dates = DB::table('cahoc_giangvien_monhoc')
            ->get();
        return $dates;
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

    public function layLichHocTrangThai($request)
    {
        $today = date("Y-m-d", strtotime($request->input('data')));
        $status = $request->input('status');
        $firstDay = date("Y-m-d", strtotime('monday this week', strtotime($today)));
        $lastDay = date("Y-m-d", strtotime('sunday this week', strtotime($today)));
        $day = date("Y-m-d", strtotime($request->input('data')));
        if ($status == "prev") {
            $day = date("Y-m-d", strtotime($firstDay . " - 1 day"));
        } else if ($status == 'next') {
            $day = date("Y-m-d", strtotime($lastDay . " + 1 day"));
        }

        $user = $request->input('user');
        $firstWeek =  date("Y-m-d", strtotime('monday this week', strtotime($day)));
        $lastWeek = date("Y-m-d", strtotime('sunday this week', strtotime($day)));

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

    // Filter
    public function LayHP($request)
    {
        $user = $request->input('user');
        $namhoc = $request->input('namhoc');
        $hocky = $request->input('hocky');
        if ($namhoc == "All") $namhoc = "";
        if ($hocky == "All") $hocky = "";
        return DB::table('giangvien_monhoc_sinhvien')
            ->join('giangvien_monhoc', 'giangvien_monhoc.mahp', 'giangvien_monhoc_sinhvien.mahp_id')
            ->join('giangviens', 'giangviens.magv', 'giangvien_monhoc.magv_id')
            ->join('monhocs', 'monhocs.mamh', 'giangvien_monhoc.mamh_id')
            ->where('giangvien_monhoc_sinhvien.masv_id', $user)
            ->where('namhoc_id', 'like', '%' . $namhoc . '%')
            ->where('hocky_id', 'like', '%' . $hocky . '%')
            ->get();
    }
}
