<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\MainService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $mainService;
    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }
    public function index(Request $request)
    {
        $lichHoc = $this->mainService->layLichHoc($request);

        $date = date('Y-m-d');

        return view('admin.main', [
            'title' => 'Quản Lý',
            'data' => $lichHoc,
            'ngay' => $date
        ]);
    }
}
