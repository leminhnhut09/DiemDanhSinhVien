<?php

namespace App\Http\Services\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UploadService
{
    public function store($request)
    {
        try {
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = $image->getClientOriginalName();
                $path_out = '/' . 'images' . '/' . date('Y-m-d') . '/' . $name;
                $image->move(public_path('images/' . date('Y-m-d')), $name);
                return $path_out;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
