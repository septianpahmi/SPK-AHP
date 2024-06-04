<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id_siswa = $user->id;
        $datahasil = Hasil::where('id_siswa', $id_siswa)->get();
        return view('admin.component.dashboard', compact('datahasil'));
    }
}
