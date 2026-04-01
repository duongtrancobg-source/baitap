@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white"><h4>Tạo Đơn Hàng Mới</h4></div>
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên khách hàng</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>

                <h5>Danh sách sản phẩm</h5>
                <table class="table" id="productTable">
                    <thead>
                        <tr>
                            <th>Tên SP</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="products[0][name]" class="form-control" required></td>
                            <td><input type="number" name="products[0][qty]" class="form-control qty" value="1" min="1"></td>
                            <td><input type="number" name="products[0][price]" class="form-control price" value="0"></td>
                            <td class="subtotal">0</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary btn-sm" id="addRow">+ Thêm sản phẩm</button>

                <div class="text-end mt-3">
                    <h3>Tổng cộng: <span id="totalDisplay">0</span> VNĐ</h3>
                    <input type="hidden" name="total_amount" id="totalInput" value="0">
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Xác nhận Lưu đơn hàng</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Thêm dòng sản phẩm mới
    let rowIdx = 1;
    document.getElementById('addRow').addEventListener('click', function() {
        let newRow = `<tr>
            <td><input type="text" name="products[${rowIdx}][name]" class="form-control" required></td>
            <td><input type="number" name="products[${rowIdx}][qty]" class="form-control qty" value="1" min="1"></td>
            <td><input type="number" name="products[${rowIdx}][price]" class="form-control price" value="0"></td>
            <td class="subtotal">0</td>
            <td><button type="button" class="btn btn-danger btn-sm remove">X</button></td>
        </tr>`;
        document.querySelector('#productTable tbody').insertAdjacentHTML('beforeend', newRow);
        rowIdx++;
    });

    // Tính tiền tự động
    document.addEventListener('input', function() {
        let total = 0;
        document.querySelectorAll('#productTable tbody tr').forEach(row => {
            let qty = row.querySelector('.qty').value || 0;
            let price = row.querySelector('.price').value || 0;
            let subtotal = qty * price;
            row.querySelector('.subtotal').innerText = subtotal.toLocaleString();
            total += subtotal;
        });
        document.getElementById('totalDisplay').innerText = total.toLocaleString();
        document.getElementById('totalInput').value = total;
    });

    // Xóa dòng
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection