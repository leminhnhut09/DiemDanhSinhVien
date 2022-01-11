<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.user.list', [
            'title' => 'Danh sách tài khoản',
            'accounts' => $this->userService->get(),
        ]);
    }

    // public function store(Request $request)
    // {
    //     $room = $this->roomService->store($request);
    //     if ($room != null) {
    //         return response()->json([
    //             'data' =>  $room,
    //             'message' => 'Thêm phòng học thành công'
    //         ]);
    //     }
    //     return response()->json([
    //         'message' => 'Thêm phòng học thất bại'
    //     ]);
    // }

    // public function show($maphong)
    // {
    //     $phong = $this->roomService->getId($maphong);
    //     return response()->json([
    //         'data' =>  $phong[0],
    //         'message' => ''
    //     ]);
    // }

    // public function update(Request $request)
    // {
    //     $result = $this->roomService->update($request);
    //     if ($result != null) {

    //         return response()->json([
    //             'data' =>  $result,
    //             'message' => 'Cập nhật phòng học thành công'
    //         ]);
    //     }
    //     return response()->json([
    //         'message' => 'Cập nhật phòng học thất bại'
    //     ]);
    // }

    // public function destroy($maphong)
    // {
    //     $isDelete = $this->roomService->delete($maphong);
    //     if ($isDelete) {
    //         return response()->json([
    //             'data' =>  'removed',
    //             'message' => 'Xóa phòng học thành công'
    //         ]);
    //     }
    //     return response()->json([
    //         'message' => 'Đối tượng không tồn tại'
    //     ]);
    // }
}
