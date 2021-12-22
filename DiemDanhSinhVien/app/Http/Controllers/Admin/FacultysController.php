<?php

namespace App\Http\Controllers\Admin;

use App\Models\Khoa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\FacultysService;

class FacultysController extends Controller
{
    protected $facultysService;
    public function __construct(FacultysService $facultysService)
    {
        $this->facultysService = $facultysService;
    }

    public function index()
    {
        return view('admin.facultys.list', [
            'title' => 'Danh sách khoa',
            'facultys' => $this->facultysService->get()
        ]);
    }

    public function store(Request $request)
    {
        $khoas = $this->facultysService->store($request);
        if ($khoas != null) {

            return response()->json([
                'data' =>  $khoas,
                'message' => 'Tạo khoa thành công'
            ], 200);
        }
        return response()->json([
            'message' => 'Tạo khoa thất bại'
        ]);
    }

    public function show($makhoa)
    {
        $khoa = $this->facultysService->getId($makhoa);
        return response()->json([
            'data' =>  $khoa[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->facultysService->update($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => 'Cập nhật khoa thành công'
            ]);
        }
        return response()->json([
            'message' => 'Cập nhật khoa thất bại'
        ]);
    }

    public function destroy($makhoa)
    {
        $isDelete = $this->facultysService->delete($makhoa);
        if ($isDelete) {
            return response()->json([
                'data' =>  'removed',
                'message' => 'Xóa khoa thành công'
            ]);
        }
        return response()->json([
            'message' => 'Đối tượng không tồn tại'
        ]);
        // InfoStudent::find($id)->delete();
        // return response()->json(['data' => 'removed'], 200);
    }
}
