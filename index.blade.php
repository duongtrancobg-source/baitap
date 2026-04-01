<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container bg-white p-4 shadow-sm rounded">
    <h2 class="text-center text-primary mb-4">QUẢN LÝ KHO SẢN PHẨM</h2>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <form action="{{ route('products.store') }}" method="POST" class="row g-2 mb-4">
        @csrf
        <div class="col-md-3"><input type="text" name="name" class="form-control" placeholder="Tên SP" required></div>
        <div class="col-md-2"><input type="number" name="price" class="form-control" placeholder="Giá" required></div>
        <div class="col-md-2"><input type="number" name="quantity" class="form-control" placeholder="Số lượng" required></div>
        <div class="col-md-3"><input type="text" name="category" class="form-control" placeholder="Danh mục"></div>
        <div class="col-md-2"><button class="btn btn-success w-100">THÊM MỚI</button></div>
    </form>

    <form action="{{ route('products.index') }}" method="GET" class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Tìm tên sản phẩm..." value="{{ $search ?? '' }}">
        <button class="btn btn-primary">TÌM</button>
    </form>

    <table class="table table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th><th>Tên Sản Phẩm</th><th>Giá</th><th>Số Lượng</th><th>Loại</th><th>Trạng Thái</th><th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td class="text-center">#{{ $p->id }}</td>
                <td class="fw-bold">{{ $p->name }}</td>
                <td>{{ number_format($p->price) }}đ</td>
                <td class="text-center">{{ $p->quantity }}</td>
                <td>{{ $p->category }}</td>
                <td class="text-center">
                    @if($p->quantity <= 5)
                        <span class="badge bg-warning text-dark">Sắp hết hàng</span>
                    @else
                        <span class="badge bg-success">Còn hàng</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>