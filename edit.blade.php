<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm - Bài 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; }
        .btn-primary { background-color: #0d6efd; border: none; }
    </form>
    </style>
</head>
<body class="p-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h3 class="text-center text-primary mb-4">CẬP NHẬT SẢN PHẨM</h3>

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Danh mục / Loại</label>
                        <input type="text" name="category" class="form-control" value="{{ $product->category }}">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">LƯU THAY ĐỔI</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Hủy bỏ</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
