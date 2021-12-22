<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\admin\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;
    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        return view('admin.room.list', [
            'title' => 'Danh sách phòng học',
            'rooms' => $this->roomService->get(),
        ]);
    }

    public function store(Request $request)
    {
        $room = $this->roomService->store($request);
        if ($room != null) {
            return response()->json([
                'data' =>  $room,
                'message' => 'Thêm phòng học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm phòng học thất bại'
        ]);
    }

    public function show($maphong)
    {
        $phong = $this->roomService->getId($maphong);
        return response()->json([
            'data' =>  $phong[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->roomService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật phòng học thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật phòng học thất bại'
        ]);
    }

    public function destroy($maphong)
    {
        $isDelete = $this->roomService->delete($maphong);
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
