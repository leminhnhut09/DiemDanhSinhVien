<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function isValidPrice($request)
    {
        $price = $request->input('price');
        $price_sale = $request->input('price_sale');
        if ($price != 0 && $price_sale != 0 && $price_sale > $price) {
            Session()->flash('error', "Vui long nhap gia giam lon nho gia goc");
            return false;
        }
        if ($price == 0 && $price_sale != 0) {
            Session()->flash('error', "Vui long nhap gia gia goc");
            return;
        }
        return true;
    }
    public function store($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;
        try {
            // $request->except('_token');
            // dd($request->input());
            Product::create($request->all());
            Session()->flash('success', "Them san pham thanh cong");
        } catch (\Exception $err) {
            Session()->flash('error', "Them san pham that bai");
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get()
    {
        // return Product::with('menu')->orderByDesc('id')->paginate(15);
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }
    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session()->flash('success', 'Cap nhat thanh cong san pham');
        } catch (\Exception $err) {
            Session()->flash('error', 'Cap nhat that bai');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
