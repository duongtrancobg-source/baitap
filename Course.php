<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    protected $table = 'mon_hoc';
    public $timestamps = false;
    protected $fillable = ['ten_mon', 'so_tin_chi'];
}