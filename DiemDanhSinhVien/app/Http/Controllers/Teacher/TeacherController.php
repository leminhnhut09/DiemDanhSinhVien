<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\TeacherService;
use App\Http\Services\admin\TermService;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\SemesterService;
use App\Http\Services\admin\StudentMService;
use App\Http\Services\admin\AttendanceService;

class TeacherController extends Controller
{
    protected $teacherService;
    protected $attendanceService;
    protected $studentMService;
    protected $termService;
    protected $semesterService;
    protected $facultysService;
    public function __construct(
        TeacherService $teacherService,
        AttendanceService $attendanceService,
        StudentMService $studentMService,
        TermService $termService,
        SemesterService $semesterService,
        FacultysService $facultysService
    ) {
        $this->teacherService = $teacherService;
        $this->attendanceService = $attendanceService;
        $this->studentService = $studentMService;
        $this->termService = $termService;
        $this->semesterService = $semesterService;
        $this->facultysService = $facultysService;
    }
    public function index(Request $request)
    {
        $arrDay = [];
        $firstWeek =  date("d-m-Y", strtotime('monday this week'));
        // $lastWeek = date("Y-m-d", strtotime('sunday this week'));
        for ($i = 1; $i <= 7; $i++) {
            array_push($arrDay, $firstWeek);
            $firstWeek = date('d-m-Y', strtotime($firstWeek . " + 1 day"));
        }
        $user = $this->teacherService->layThongTin($request);
        $lichDay = $this->teacherService->layLichDay($request);
        return view('teacher.index', [
            'title' => 'Thông tin giảng viên',
            'data' => $lichDay,
            'ngay' => date('d-m-Y'),
            'user' => $user,
            'days' => $arrDay,
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

    public function indexTeacher(Request $request)
    {
        $years = $this->semesterService->getYear();
        return view('teacher.schedule', [
            'title' => 'Danh sách sinh viên',
            'user' => $this->teacherService->layThongTin($request),
            'attendances' => $this->teacherService->getForTeacher($request),
            'students' => $this->studentService->get(),
            'terms' => $this->termService->get(),
            'years' => $years,
            'facultys' => $this->facultysService->get(),
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



    // filter

    public function getFilter(Request $request)
    {
        //dd($request->input());
        $result = $this->teacherService->LayHP($request);
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

        $result = $this->teacherService->layLichDayTrangThai($request);
        return response()->json([
            'data' =>  [$result, $arrDay],
            'message' => ''
        ]);
        return response()->json([
            'message' => ''
        ]);
    }
}
