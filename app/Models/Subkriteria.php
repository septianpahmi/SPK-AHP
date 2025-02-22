<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    public function idKriteria(){
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
