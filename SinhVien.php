<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model {
    protected $table = 'sinh_vien';
    public $timestamps = false; // Tắt vì bảng của bạn không có cột thời gian
    protected $fillable = ['ho_ten', 'nganh_hoc', 'email'];

    public function mon_hocs() {
        return $this->belongsToMany(Course::class, 'dang_ky_mon', 'sinh_vien_id', 'mon_hoc_id');
    }
}