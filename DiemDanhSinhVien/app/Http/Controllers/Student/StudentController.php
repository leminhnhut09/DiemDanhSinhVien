<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StudentService;
use App\Http\Services\TeacherService;

class StudentController extends Controller
{
    protected $studentService;
    protected $teacherService;
    public function __construct(StudentService $studentService, TeacherService $teacherService)
    {
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;
    }

    public function index(Request $request)
    {
        $user = $this->studentService->layThongTin($request);
        $listSubject = $this->studentService->GetListSubject($request);
        $lichHoc = $this->studentService->layLichHoc($request);
        $dates = $this->studentService->GetDateSchedule();
        // dd($user);
        return view('student.index', [
            'title' => 'Thông tin sinh viên',
            'data' => $user,
            'subjects' => $listSubject,
            'dates' => $dates,
            'numSubject' => $lichHoc->count()
        ]);
    }

    // hien thi lich
    public function store(Request $request)
    {
        //dd($request->input());
        // kiem tra la giang vien hay sinh vien
        $user = $this->studentService->layThongTin($request);
        $lichHoc = $this->studentService->layLichHoc($request);
        $date = date('Y-m-d');
        return view('student.schedule', [
            'title' => 'Thông tin sinh viên',
            'data' => $lichHoc,
            'ngay' => $date,
            'user' => $user
        ]);
    }


    public function show(Request $request)
    {
        //dd($request->input());
        $result = $this->studentService->findAttendance($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Đã điểm danh buổi học'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Chưa điểm danh buổi học'
        ]);
    }
}
