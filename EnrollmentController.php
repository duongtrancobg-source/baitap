<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\Course;

class EnrollmentController extends Controller {
    public function index() {
        $sinhviens = SinhVien::with('mon_hocs')->get();
        $courses = Course::all();
        return view('enrollments.index', compact('sinhviens', 'courses'));
    }
    public function storeCourse(Request $request) {
        Course::create($request->all());
        return redirect()->back()->with('success', 'Đã thêm môn học!');
    }
    public function register(Request $request) {
        $student = SinhVien::findOrFail($request->sinh_vien_id);
        $course = Course::findOrFail($request->mon_hoc_id);
        if ($student->mon_hocs()->where('mon_hoc_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'Đã đăng ký môn này!');
        }
        if ($student->mon_hocs()->sum('so_tin_chi') + $course->so_tin_chi > 18) {
            return redirect()->back()->with('error', 'Vượt quá 18 tín chỉ!');
        }
        $student->mon_hocs()->attach($course->id);
        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }
}