<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'gender',
        'semester',
        'tahun_masuk',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'anak_ke',
        'saudara',
        'id_user',
        'id_kelas',
    ];
    public function idKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
