<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{
    protected $sliderService;
    // Constructor
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function create()
    {
        return view('admin.sliders.add', [
            'title' => 'Add Slider'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ]);

        $this->sliderService->insert($request);
        return redirect()->back();
    }
    public function index(Request $request)
    {
        return view('admin.sliders.list', [
            'title' => 'List Slider',
            'sliders' => $this->sliderService->get()
        ]);
    }
    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'title' => 'Edit Slider',
            'slider' => $slider
        ]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ]);
        $result = $this->sliderService->update($request, $slider);
        if ($result) {
            return redirect('/admin/sliders/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->sliderService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoa thanh cong'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
