@extends('layouts.app') {{-- Hoặc file layout chính của bạn --}}
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>Danh sách đơn hàng</h3>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Tạo đơn mới</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td class="text-danger fw-bold">{{ number_format($order->total_amount) }}đ</td>
                <td>
                    @if($order->status == 'pending')
                        <span class="badge bg-secondary">Chờ xử lý</span>
                    @elseif($order->status == 'processing')
                        <span class="badge bg-primary">Đang giao</span>
                    @else
                        <span class="badge bg-success">Hoàn thành</span>
                    @endif
                </td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info text-white">Xem chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection