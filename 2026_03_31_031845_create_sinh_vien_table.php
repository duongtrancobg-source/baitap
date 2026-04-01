<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('ho_ten');
            $table->string('nganh_hoc');
            $table->string('email')->unique(); // Email không được trùng
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinh_vien');
    }
};