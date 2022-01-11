<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StudentService;
use App\Http\Services\TeacherService;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\SemesterService;

class StudentController extends Controller
{
    protected $studentService;
    protected $teacherService;
    protected $facultysService;
    protected $semesterService;
    public function __construct(
        StudentService $studentService,
        TeacherService $teacherService,
        SemesterService $semesterService,
        FacultysService $facultysService
    ) {
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;
        $this->facultysService = $facultysService;
        $this->semesterService = $semesterService;
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
            'numSubject' => $lichHoc->count(),
            'facultys' => $this->facultysService->get(),
            'years' => $this->semesterService->getYear()
        ]);
    }

    // hien thi lich
    public function store(Request $request)
    {
        $arrDay = [];
        $firstWeek =  date("d-m-Y", strtotime('monday this week'));
        // $lastWeek = date("Y-m-d", strtotime('sunday this week'));
        for ($i = 1; $i <= 7; $i++) {
            array_push($arrDay, $firstWeek);
            $firstWeek = date('d-m-Y', strtotime($firstWeek . " + 1 day"));
        }
        $user = $this->studentService->layThongTin($request);
        $lichHoc = $this->studentService->layLichHoc($request);
        return view('student.schedule', [
            'title' => 'Thông tin sinh viên',
            'data' => $lichHoc,
            'ngay' => date('d-m-Y'),
            'user' => $user,
            'days' => $arrDay,
        ]);
    }


    public function show(Request $request)
    {
        //dd($request->input());
        $result = $this->studentService->findAttendance($request);
        if ($result == 'true') {
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

    public function getschedule(Request $request)
    {
        $today = date("Y-m-d", strtotime($request->input('data')));
        $status = $request->input('status');
        $firstDay = date("Y-m-d", strtotime('monday this week', strtotime($today)));
        $lastDay = date("Y-m-d", strtotime('sunday this week', strtotime($today)));
        $day = date("Y-m-d", strtotime($request->input('data')));
        if ($status == "prev") {
            $day = date("Y-m-d", strtotime($firstDay . " - 1 day"));
        } else if ($status == "next") {
            $day = date("Y-m-d", strtotime($lastDay . " + 1 day"));
        }
        $arrDay = [];
        $firstWeek =  date("d-m-Y", strtotime('monday this week', strtotime($day)));
        for ($i = 1; $i <= 7; $i++) {
            array_push($arrDay, $firstWeek);
            $firstWeek = date('d-m-Y', strtotime($firstWeek . " + 1 day"));
        }

        $result = $this->studentService->layLichHocTrangThai($request);
        return response()->json([
            'data' =>  [$result, $arrDay],
            'message' => ''
        ]);
        return response()->json([
            'message' => ''
        ]);
    }

    public function getFilter(Request $request)
    {
        $result = $this->studentService->LayHP($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => ''
            ]);
        }
        return response()->json([
            'message' => ''
        ]);
    }
}
