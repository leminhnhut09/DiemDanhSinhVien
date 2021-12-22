<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\TermService;
use App\Http\Services\admin\StudentMService;
use App\Http\Services\admin\AttendanceService;

class AttendanceController extends Controller
{
    protected $attendanceService;
    protected $studentMService;
    protected $termService;

    public function __construct(
        AttendanceService $attendanceService,
        StudentMService $studentMService,
        TermService $termService
    ) {
        $this->attendanceService = $attendanceService;
        $this->studentService = $studentMService;
        $this->termService = $termService;
    }

    public function index()
    {
        return view('admin.attendance.list', [
            'title' => 'Danh sách điểm danh',
            'attendances' => $this->attendanceService->get(),
            'students' => $this->studentService->get(),
            'terms' => $this->termService->get()
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
}
