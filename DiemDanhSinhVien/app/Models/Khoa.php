<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $primaryKey;
    use HasFactory;
    public function __construct()
    {
        $this->primaryKey = "id";
    }
    protected $fillable = [
        'makhoa',
        'tenkhoa',
        'ngaythanhlap',
    ];
}
