<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tạo bảng Môn học
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mon');
            $table->integer('so_tin_chi');
            $table->timestamps();
        });

        // 2. Tạo bảng Đăng ký môn (Bảng trung gian)
        Schema::create('dang_ky_mon', function (Blueprint $table) {
            $table->id();
            // Liên kết với bảng sinh_vien (phải đúng tên bảng Bài 1 của bạn)
            $table->foreignId('sinh_vien_id')->constrained('sinh_vien')->onDelete('cascade');
            // Liên kết với bảng mon_hoc vừa tạo bên trên
            $table->foreignId('mon_hoc_id')->constrained('mon_hoc')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dang_ky_mon');
        Schema::dropIfExists('mon_hoc');
    }
};