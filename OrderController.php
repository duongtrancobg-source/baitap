<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create() {
        return view('orders.create');
    }

    public function store(Request $request) {
        DB::transaction(function () use ($request) {
            // 1. Lưu Order
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'total_amount' => $request->total_amount,
                'status' => 'pending',
            ]);

            // 2. Lưu từng sản phẩm vào OrderItem
            foreach ($request->products as $product) {
                $order->items()->create([
                    'product_name' => $product['name'], // 'name' từ form -> 'product_name' vào DB
                    'qty' => $product['qty'],
                    'price' => $product['price'],
                ]);
            }
        });

        return redirect()->route('orders.index')->with('success', 'Thành công!');
    }

    public function index() {
        $orders = Order::with('items')->latest()->get();
        return view('orders.index', compact('orders'));
    }
}