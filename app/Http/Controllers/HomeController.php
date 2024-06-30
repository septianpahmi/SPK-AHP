<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Peserta;
use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $peserta = Peserta::where('id_siswa', $user)->first();
        $data = Beasiswa::all();
        $hasil = Hasil::where('id_siswa', $user)->first();
        $beasiswa = Beasiswa::count();
        $siswa = User::where('role', 'user')->count();
        $kriteria = Kriteria::count();
        $sub = Subkriteria::count();
        return view('admin.component.dashboard', compact('data', 'peserta', 'siswa', 'beasiswa', 'kriteria', 'sub', 'hasil'));
    }
}
