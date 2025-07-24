<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
   use SoftDeletes;

    protected $fillable = [
        'nama', 'jk', 'alamat', 'jabatan', 'tgl', 'departemen_id'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
