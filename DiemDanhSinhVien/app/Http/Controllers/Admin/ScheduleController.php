<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\RoomService;
use App\Http\Services\admin\TermService;
use App\Http\Services\admin\LessonService;
use App\Http\Services\admin\ScheduleService;
use App\Http\Services\admin\SubjectsService;

class ScheduleController extends Controller
{
    protected $scheduleService;
    protected $termService;
    protected $lessonService;
    protected $roomService;
    public function __construct(
        ScheduleService $scheduleService,
        TermService $termService,
        LessonService $lessonService,
        RoomService $roomService
    ) {
        $this->scheduleService = $scheduleService;
        $this->termService = $termService;
        $this->lessonService = $lessonService;
        $this->roomService = $roomService;
    }

    public function index()
    {
        return view('admin.schedule.list', [
            'title' => 'Danh sách lịch học',
            'schedules' => $this->scheduleService->get(),
            'terms' => $this->termService->get(),
            'lessons' => $this->lessonService->get(),
            'rooms' => $this->roomService->get()
        ]);
    }

    public function store(Request $request)
    {
        $lh = $this->scheduleService->store($request);
        if ($lh != null) {
            return response()->json([
                'data' =>  $lh,
                'message' => 'Thêm lịch học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm lịch học thất bại'
        ]);
    }

    public function show($mahp_id, $tuan)
    {
        $lh = $this->scheduleService->getId($mahp_id, $tuan);
        return response()->json([
            'data' =>  $lh[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->scheduleService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật học phần thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật học phần thất bại'
        ]);
    }

    public function destroy($mahp, $tuan)
    {
        $isDelete = $this->scheduleService->delete($mahp, $tuan);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa học phần thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
    }
}
