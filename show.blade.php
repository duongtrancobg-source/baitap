@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Chi tiết đơn hàng #{{ $order->id }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
            <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá lúc mua</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->price) }}đ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price * $item->quantity) }}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-end text-danger">Tổng cộng: {{ number_format($order->total_amount) }}đ</h4>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
</div>
@endsection