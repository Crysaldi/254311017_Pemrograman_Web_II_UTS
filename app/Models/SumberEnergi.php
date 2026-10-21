<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberEnergi extends Model
{
    protected $fillable = [
        'nama_energi',
        'jenis_energi',
        'kapasitas',
        'lokasi',
        'status_aktif',
    ];
}