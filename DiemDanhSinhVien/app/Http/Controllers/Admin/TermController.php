<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\admin\TermService;
use App\Http\Services\admin\FacultysService;
use App\Http\Services\admin\SemesterService;
use App\Http\Services\admin\SubjectsService;
use App\Http\Services\admin\TeacherMService;

class TermController extends Controller
{
    protected $termService;
    protected $teacherMService;
    protected $subjectsService;
    protected $semesterService;
    protected $facultysService;
    public function __construct(
        TermService $termService,
        TeacherMService $teacherMService,
        SubjectsService $subjectsService,
        SemesterService $semesterService,
        FacultysService $facultysService
    ) {
        $this->termService = $termService;
        $this->teacherMService = $teacherMService;
        $this->subjectsService = $subjectsService;
        $this->semesterService = $semesterService;
        $this->facultysService = $facultysService;
    }

    public function index()
    {
        $years = $this->semesterService->getYear();
        return view('admin.term.list', [
            'title' => 'Danh sách học phần',
            'terms' => $this->termService->get(),
            'teachers' => $this->teacherMService->get(),
            'subjects' => $this->subjectsService->get(),
            'years' => $years,
            'terms' => $this->termService->get(),
            'facultys' => $this->facultysService->get(),
            'semesters' => $this->semesterService->getSemesterID($years[0]->namhoc)
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $hp = $this->termService->store($request);
        if ($hp != null) {
            return response()->json([
                'data' =>  $hp,
                'message' => 'Thêm học phần thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm học phần thất bại'
        ]);
    }

    public function show($mahp)
    {
        $gv = $this->termService->getId($mahp);
        return response()->json([
            'data' =>  $gv[0],
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->termService->update($request);
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

    public function destroy($mahp)
    {
        $isDelete = $this->termService->delete($mahp);
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

    public function getsemester($namhoc)
    {
        $data = $this->semesterService->getSemesterID($namhoc);
        if ($data != null) {
            return response()->json([
                'data' =>  $data,
                'message' => ''
            ]);
        }
        return response()->json([
            'data' =>  [],
            'message' => 'fail'
        ]);
    }
    // excel
    public function storeXLSX(Request $request)
    {
        //dd($request->input());
        $dd = $this->termService->storeXLSX($request);
        if ($dd != null) {
            return response()->json([
                'data' =>  $dd,
                'message' => 'Thêm lớp học phần thành công'
            ]);
        }
        return response()->json([
            'message' => 'Thêm lớp học phần thất bại'
        ]);
    }

    public function getFilter(Request $request)
    {
        //dd($request->input());
        $result = $this->termService->LayHP($request);
        if ($result != null) {

            return response()->json([
                'data' =>  $result,
                'message' => ''
            ]);
        }
        return response()->json([
            'message' => ''
        ]);
    }
}
