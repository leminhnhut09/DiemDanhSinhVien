<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\admin\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $lessonService;
    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    public function index()
    {
        return view('admin.lesson.list', [
            'title' => 'Danh sách ca học',
            'lessons' => $this->lessonService->get(),
        ]);
    }

    public function store(Request $request)
    {
        $lesson = $this->lessonService->store($request);
        if ($lesson != null) {
            return response()->json([
                'data' =>  $lesson,
                'message' => 'Thêm ca học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm ca học thất bại'
        ]);
    }

    public function show($macahoc)
    {
        $cahoc = $this->lessonService->getId($macahoc);
        return response()->json([
            'data' =>  $cahoc[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->lessonService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật ca học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật ca học thất bại'
        ]);
    }

    public function destroy($macahoc)
    {
        $isDelete = $this->lessonService->delete($macahoc);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa phòng học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
