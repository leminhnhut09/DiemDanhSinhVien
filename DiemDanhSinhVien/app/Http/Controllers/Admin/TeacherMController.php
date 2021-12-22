<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\TeacherMService;

class TeacherMController extends Controller
{
    protected $facultysService;
    protected $teacherMService;
    public function __construct(TeacherMService $teacherMService, FacultysService $facultysService)
    {
        $this->facultysService = $facultysService;
        $this->teacherMService = $teacherMService;
    }

    public function index()
    {
        return view('admin.teacher.list', [
            'title' => 'Danh sách giảng viên',
            'facultys' => $this->facultysService->get(),
            'teachers' => $this->teacherMService->get()
        ]);
    }

    public function store(Request $request)
    {
        $sv = $this->teacherMService->store($request);
        if ($sv != null) {
            return response()->json([
                'data' =>  $sv,
                'message' => 'Thêm giảng viên thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm lớp thất bại'
        ]);
    }

    public function show($magv)
    {
        $gv = $this->teacherMService->getId($magv);
        return response()->json([
            'data' =>  $gv[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->teacherMService->update($request);
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

    public function destroy($magv)
    {
        $isDelete = $this->teacherMService->delete($magv);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa giảng viên thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
