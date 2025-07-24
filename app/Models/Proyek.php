<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'];

    public function karyawans()
    {
        return $this->belongsToMany(Karyawan::class);
    }
}
