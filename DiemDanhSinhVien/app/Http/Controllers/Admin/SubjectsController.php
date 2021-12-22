<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\SubjectsService;

class SubjectsController extends Controller
{
    protected $facultysService;
    protected $subjectsService;
    public function __construct(SubjectsService $subjectsService, FacultysService $facultysService)
    {
        $this->subjectsService = $subjectsService;
        $this->facultysService = $facultysService;
    }

    public function index()
    {
        return view('admin.subjects.list', [
            'title' => 'Danh sách môn học',
            'subjects' => $this->subjectsService->get(),
            'facultys' => $this->facultysService->get()
        ]);
    }

    public function store(Request $request)
    {
        $mh = $this->subjectsService->store($request);
        if ($mh != null) {
            return response()->json([
                'data' =>  $mh,
                'message' => 'Thêm môn học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm môn học thất bại'
        ]);
    }

    public function show($mamh)
    {
        $mh = $this->subjectsService->getId($mamh);
        return response()->json([
            'data' =>  $mh[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->subjectsService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật môn học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật môn học thất bại'
        ]);
    }

    public function destroy($mamh)
    {
        $isDelete = $this->subjectsService->delete($mamh);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa môn học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
