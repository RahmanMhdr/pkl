<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    
    protected $table = 'departemens'; // Pastikan ini sesuai

    protected $fillable = ['nama'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
