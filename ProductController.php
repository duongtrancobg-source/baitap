<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('products.index', compact('products', 'search'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm!');
    }
}