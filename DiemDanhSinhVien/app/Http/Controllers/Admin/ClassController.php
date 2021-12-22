<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\ClassService;
use App\Http\Services\admin\FacultysService;

class ClassController extends Controller
{
    protected $classService;
    protected $facultysService;
    public function __construct(ClassService $classService, FacultysService $facultysService)
    {
        $this->classService = $classService;
        $this->facultysService = $facultysService;
    }

    public function index()
    {
        return view('admin.classer.list', [
            'title' => 'Danh sách lớp',
            'classer' => $this->classService->get(),
            'facultys' => $this->facultysService->get()
        ]);
    }

    public function store(Request $request)
    {
        $lops = $this->classService->store($request);
        if ($lops != null) {
            return response()->json([
                'data' =>  $lops,
                'message' => 'Tạo lớp thành công'
            ]);
        }
        return response()->json([
            'message' => 'Tạo lớp thất bại'
        ]);
    }

    public function show($malop)
    {
        $lop = $this->classService->getId($malop);
        return response()->json([
            'data' =>  $lop[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->classService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật lớp thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật lớp thất bại'
        ]);
    }

    public function destroy($malop)
    {
        $isDelete = $this->classService->delete($malop);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa lớp thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
