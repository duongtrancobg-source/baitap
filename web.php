<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EnrollmentController;

// BÀI 1: SINH VIÊN
Route::get('/sinh-vien', [SinhVienController::class, 'index'])->name('sinh_vien.index');
Route::post('/sinh-vien', [SinhVienController::class, 'store'])->name('sinh_vien.store');

// BÀI 2: SẢN PHẨM
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
// BÀI 3: MÔN HỌC & ĐĂNG KÝ
Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('/enrollment/add-course', [EnrollmentController::class, 'storeCourse'])->name('courses.store');
Route::post('/enrollment/register', [EnrollmentController::class, 'register'])->name('enrollments.register');