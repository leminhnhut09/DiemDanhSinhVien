<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa menu ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParents()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $result = $this->menuService->update($menu, $request);
        if ($result) {
            return redirect()->route('menus.list.index');
        }
        return redirect()->back();
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục',
            'menus' => $this->menuService->getParents()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
