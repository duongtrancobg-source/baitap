<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh viên - Laravel MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 40px 0; }
        .container { max-width: 1000px; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; background: white; }
        .card-header-custom { background: #007bff; color: white; padding: 20px; font-weight: bold; font-size: 1.2rem; border: none; }
        .btn-save { background: #28a745; color: white; font-weight: bold; border-radius: 8px; padding: 10px 25px; transition: 0.3s; }
        .btn-save:hover { background: #218838; transform: translateY(-2px); }
        .table thead { background: #f8f9fa; color: #495057; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #e1e4e8; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(0,123,255,0.1); border-color: #007bff; }
        h1 { color: #0062cc; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-5">Danh Sách Sinh Viên</h1>

    <div class="main-card shadow-sm mb-4">
        <div class="card-header-custom">
            Thêm Sinh Viên Mới
        </div>
        <div class="card-body p-4">
            <form action="{{ route('sinh_vien.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Họ tên</label>
                        <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ tên..." required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Ngành học</label>
                        <input type="text" name="nganh_hoc" class="form-control" placeholder="VD: CNTT" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-save w-100">LƯU LẠI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="main-card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Họ Tên</th>
                        <th>Ngành Học</th>
                        <th>Email</th>
                        <th class="text-center">Ngày Tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sinhviens as $sv)
                    <tr>
                        <td class="ps-4 fw-bold">#{{ $sv->id }}</td>
                        <td>{{ $sv->ho_ten }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $sv->nganh_hoc }}</span></td>
                        <td>{{ $sv->email }}</td>
                        <td class="text-center text-muted small">{{ $sv->created_at ? $sv->created_at->format('d/m/Y') : '---' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Chưa có sinh viên nào trong danh sách.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>