<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\TeacherService;

class TeacherController extends Controller
{
    protected $teacherService;
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }
    public function index(Request $request)
    {
        $user = $this->teacherService->layThongTin($request);
        // dd($user);
        return view('teacher.index', [
            'title' => 'Thông tin giảng viên',
            'data' => $user
        ]);
    }

    // hien thi lich
    public function store(Request $request)
    {
        $user = $this->teacherService->layThongTin($request);
        $lichDay = $this->teacherService->layLichDay($request);
        $date = date('Y-m-d');
        return view('teacher.schedule', [
            'title' => 'Thông tin giảng viên',
            'data' => $lichDay,
            'ngay' => $date,
            'user' => $user
        ]);
    }


    public function create($mahp)
    {
        // lấy mã giảng viên, mã học phần
        return view('teacher.attendance', [
            'title' => 'Điểm danh',
            'mahp' => $mahp
        ]);
    }

    public function update(Request $request)
    {
        dd($request->input());
        // $arr = $request->input('arrMSSV');
        // dd($arr);
        // $result = $this->teacherService->update($request);
        // if ($result) {
        //     return response()->json([
        //         'error' => false,
        //         'message' => 'Đã điểm danh',
        //     ]);
        // }
        // return response()->json([
        //     'error' => true,
        //     'message' => 'Chưa điểm danh'
        // ]);
        // echo $result;
    }
}
