<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\TermService;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\SemesterService;
use App\Http\Services\admin\StudentMService;
use App\Http\Services\admin\AttendanceService;

class AttendanceController extends Controller
{
    protected $attendanceService;
    protected $studentMService;
    protected $termService;
    protected $semesterService;
    protected $facultysService;
    public function __construct(
        AttendanceService $attendanceService,
        StudentMService $studentMService,
        TermService $termService,
        SemesterService $semesterService,
        FacultysService $facultysService
    ) {
        $this->attendanceService = $attendanceService;
        $this->studentService = $studentMService;
        $this->termService = $termService;
        $this->semesterService = $semesterService;
        $this->facultysService = $facultysService;
    }

    public function index()
    {
        $years = $this->semesterService->getYear();
        return view('admin.attendance.list', [
            'title' => 'Danh sách điểm danh',
            'attendances' => $this->attendanceService->get(),
            'students' => $this->studentService->get(),
            'terms' => $this->termService->get(),
            'years' => $years,
            'facultys' => $this->facultysService->get(),
        ]);
    }

    public function store(Request $request)
    {
        $dd = $this->attendanceService->store($request);
        if ($dd != null) {
            return response()->json([
                'data' =>  $dd,
                'message' => 'Thêm điểm danh thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm điểm danh thất bại'
        ]);
    }
    public function storeXLSX(Request $request)
    {
        $dd = $this->attendanceService->storeXLSX($request);
        if ($dd != null) {
            return response()->json([
                'data' =>  $dd,
                'message' => 'Thêm điểm danh thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm điểm danh thất bại'
        ]);
    }
    public function show($mahp_id, $masv)
    {
        $lh = $this->attendanceService->getId($mahp_id, $masv);
        return response()->json([
            'data' =>  $lh[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->attendanceService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật điểm danh thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật điểm danh thất bại'
        ]);
    }

    public function destroy($mahp, $masv)
    {
        $isDelete = $this->attendanceService->delete($mahp, $masv);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa điểm danh thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }

    public function getYear(Request $request)
    {
        $result = $this->attendanceService->LayHPTheoNam($request);
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

    public function getSemester(Request $request)
    {
        //dd($request->input());
        $result = $this->attendanceService->LayHPTheoHocKy($request);
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

    public function getFacultys(Request $request)
    {
        //dd($request->input());
        $result = $this->attendanceService->LayHPTheoKhoa($request);
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

    public function getFilter(Request $request)
    {
        //dd($request->input());
        $result = $this->attendanceService->LayHP($request);
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
