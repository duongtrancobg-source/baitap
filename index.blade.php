<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3: Quản lý & Đăng ký Môn học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container bg-white p-4 shadow-sm rounded">
    
    <h2 class="text-center text-primary mb-4">QUẢN LÝ MÔN HỌC & ĐĂNG KÝ</h2>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card card-body mb-4">
                <h5 class="card-title">1. Thêm Môn Học Mới</h5>
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label>Tên môn học:</label>
                        <input type="text" name="ten_mon" class="form-control" required placeholder="VD: Lập trình PHP">
                    </div>
                    <div class="mb-2">
                        <label>Số tín chỉ:</label>
                        <input type="number" name="so_tin_chi" class="form-control" required placeholder="VD: 3">
                    </div>
                    <button class="btn btn-success w-100">Thêm vào danh sách</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-body">
                <h5 class="card-title">2. Đăng Ký Môn Cho Sinh Viên</h5>
                <form action="{{ route('enrollments.register') }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col-md-5">
                        <select name="sinh_vien_id" class="form-select">
                            <option value="">-- Chọn Sinh viên --</option>
                            @foreach($sinhviens as $sv)
                                <option value="{{ $sv->id }}">{{ $sv->ho_ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select name="mon_hoc_id" class="form-select">
                            <option value="">-- Chọn Môn học --</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}">{{ $c->ten_mon }} ({{ $c->so_tin_chi }} TC)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">ĐĂNG KÝ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
    <h5 class="mt-4">Danh sách sinh viên đã đăng ký</h5>
    <table class="table table-bordered mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>Tên Sinh Viên</th>
                <th>Môn Đã Đăng Ký</th>
                <th>Tổng Tín Chỉ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sinhviens as $sv)
            <tr>
                <td class="fw-bold">{{ $sv->ho_ten }}</td>
                <td>
                    @forelse($sv->mon_hocs as $m)
                        <span class="badge bg-info text-dark">{{ $m->ten_mon }}</span>
                    @empty
                        <span class="text-muted">Chưa có môn nào</span>
                    @endforelse
                </td>
                <td class="text-center">{{ $sv->mon_hocs->sum('so_tin_chi') }} / 18</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>