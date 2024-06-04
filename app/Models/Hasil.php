<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['id_siswa', 'id_beasiswa', 'penghasilan', 'tanggungan', 'pekerjaan', 'asset', 'ahp'];

    public function idSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
    public function idBeasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }
}
