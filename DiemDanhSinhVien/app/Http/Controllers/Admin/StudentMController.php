<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\ClassService;
use App\Http\Services\admin\StudentMService;

class StudentMController extends Controller
{
    protected $classService;
    protected $studentMService;
    public function __construct(StudentMService $studentMService, ClassService $classService)
    {
        $this->classService = $classService;
        $this->studentMService = $studentMService;
    }

    public function index()
    {
        return view('admin.student.list', [
            'title' => 'Danh sách sinh viên',
            'classes' => $this->classService->get(),
            'students' => $this->studentMService->get()
        ]);
    }

    public function store(Request $request)
    {
        $sv = $this->studentMService->store($request);
        if ($sv != null) {
            return response()->json([
                'data' =>  $sv,
                'message' => 'Thêm sinh viên thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm lớp thất bại'
        ]);
    }

    public function show($masv)
    {
        $sv = $this->studentMService->getId($masv);
        return response()->json([
            'data' =>  $sv[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->studentMService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật sinh viên thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật sinh viên thất bại'
        ]);
    }

    public function destroy($masv)
    {
        $isDelete = $this->studentMService->delete($masv);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa sinh viên thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
