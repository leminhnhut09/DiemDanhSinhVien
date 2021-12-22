<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\SemesterService;

class SemesterController extends Controller
{
    protected $semesterService;
    public function __construct(SemesterService $semesterService)
    {
        $this->semesterService = $semesterService;
    }

    public function index()
    {
        return view('admin.semester.list', [
            'title' => 'Danh sách học kỳ',
            'semesters' => $this->semesterService->get(),
        ]);
    }

    public function store(Request $request)
    {
        $hk = $this->semesterService->store($request);
        if ($hk != null) {
            return response()->json([
                'data' =>  $hk,
                'message' => 'Thêm học kỳ thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm học kỳ thất bại'
        ]);
    }

    public function show($namhoc, $hocky)
    {
        $hk = $this->semesterService->getId($namhoc, $hocky);
        return response()->json([
            'data' =>  $hk[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->semesterService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật học kỳ thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật học kỳ thất bại'
        ]);
    }

    public function destroy($namhoc, $hocky)
    {
        $isDelete = $this->semesterService->delete($namhoc, $hocky);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa học kỳ thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
