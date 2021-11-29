<?php

namespace App\Http\Services;

use App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MainService
{
    public function layLichHoc($request)
    {
        $user = $request->input('user');
        $firstWeek =  date("Y-m-d", strtotime('monday this week'));
        $lastWeek = date("Y-m-d", strtotime('sunday this week'));


        $listHP = DB::table('giangvien_monhoc_sinhvien')
            ->where('masv_id', $user)
            ->select('mahp_id')
            ->get();

        $list = [];
        foreach ($listHP as $hp) {
            array_push($list, $hp->mahp_id);
        }

        $lichHoc = DB::table('giangvien_monhoc')
            ->join('cahoc_giangvien_monhoc', 'giangvien_monhoc.mahp', 'cahoc_giangvien_monhoc.mahp_id')
            ->join('cahocs', 'cahoc_giangvien_monhoc.macahoc_id', 'cahocs.macahoc')
            ->whereIn('giangvien_monhoc.mahp', $list)
            ->where('ngay', '>=', $firstWeek)
            ->where('ngay', '<=', $lastWeek)
            ->select('giangvien_monhoc.*', 'cahoc_giangvien_monhoc.*', 'cahocs.*')
            ->get();

        return $lichHoc;
    }

    // public function getAll($parent_id = 1)
    // {
    //     return Menu::orderbyDesc('id')->paginate(20);
    // }

    // public function create($request)
    // {
    //     try {
    //         Menu::create([
    //             'name' => (string)$request->input('name'),
    //             'parent_id' => (string)$request->input('parent_id'),
    //             'description' => (string)$request->input('description'),
    //             'content' => (string)$request->input('content'),
    //             'active' => (string)$request->input('active'),
    //             'slug' => Str::slug($request->input('name'), '-')
    //         ]);
    //         Session()->flash('success', 'Tạo danh mục thành công');
    //     } catch (\Exception $e) {
    //         Session()->flash('error', $e->getMessage());
    //         return false;
    //     }
    //     return true;
    // }

    // public function destroy($request)
    // {
    //     $id = (int)$request->input('id');
    //     $menu = Menu::where('id', $id)->first();
    //     if ($menu) {
    //         return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
    //     }
    //     return false;
    // }

    // public function update($menu, $request): bool
    // {
    //     try {
    //         // update basic
    //         $menu->name = (string)$request->input('name');
    //         if ($request->parent_id != $menu->id) {
    //             $menu->parent_id = (int)$request->input('parent_id');
    //         }
    //         $menu->description = (string)$request->input('description');
    //         $menu->content = (string)$request->input('content');
    //         $menu->active = (string)$request->input('active');
    //         $menu->save();
    //         Session()->flash('success', 'Cập nhật danh mục thành công !');
    //         return true;
    //     } catch (\Exception $ex) {
    //         Session()->flash('success', $ex->getMessage());
    //         return true;
    //     }
    // }
}
