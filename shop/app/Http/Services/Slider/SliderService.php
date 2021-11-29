<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;

class SliderService
{
    public function insert($request)
    {
        try {
            Slider::create($request->input());
            Session()->flash('success', 'Them slider thanh cong');
        } catch (\Exception $err) {
            Session()->flash('error', 'Them slider that bai');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session()->flash('success', 'Update slider thanh cong');
        } catch (\Exception $err) {
            Log::info($err->getMessage());
            Session()->flash('error', 'Update fail');
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $slider->delete();
            return true;
        }
        return false;
    }
}
