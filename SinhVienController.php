<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SinhVien;

class SinhVienController extends Controller {
    public function index() {
        $sinhviens = SinhVien::all();
        return view('sinh_vien.index', compact('sinhviens'));
    }
    public function store(Request $request) {
        SinhVien::create($request->all());
        return redirect()->back()->with('success', 'Thêm thành công!');
    }
}