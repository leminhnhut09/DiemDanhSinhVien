<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class ProductController extends Controller
{

    protected $menu;
    protected $productService;
    public function __construct(ProductService $productService, MenuService $menu)
    {
        $this->productService = $productService;
        $this->menu = $menu;
    }


    /**
     * Display a listing of the resource.
     * Hiển thị danh sách sản phẩm
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.list', [
            'title' => 'Danh sach san pham',
            'products' => $this->productService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Hiển thị form tạo sản phẩm
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Create a new product',
            'menus' => $this->menu->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Lưu sản phẩm 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  ProductReques: validation thong qua request
    public function store(ProductRequest $request)
    {
        $this->productService->store($request);
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     * Hiển thị chi tiết của 1 sản phẩm
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return view('admin.products.edit', [
            'title' => "Edit Product",
            'product' => $product,
            'menus' => $this->menu->getAll()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * Hiên thị form cập nhật sản phẩm
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     * Cập nhật sản phẩm
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *  Xóa sản phẩm
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
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
