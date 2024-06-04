<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Comparisons;
use App\Models\DataSiswa;
use App\Models\Kelas;
use App\Models\Kriteria;
use App\Models\Peserta;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->get();
        $kriteria = Kriteria::all();
        // $idKriteria = $kriteria->first()->id;
        // $subkriteria = Subkriteria::where('id_kriteria', $idKriteria)->get();
        $subkriteria = Subkriteria::all();
        $beasiswa = Beasiswa::all();
        $data = Peserta::all();
        return view('admin.component.peserta', compact('data', 'user', 'kriteria', 'subkriteria', 'beasiswa'));
    }

    public function post(Request $request)
    {
        $pesertaData = [
            'id_siswa' => $request->id_siswa,
            'id_beasiswa' => $request->id_beasiswa,
            'status' => "Mendaftar",
            'penghasilan' => $request->penghasilan,
            'pekerjaan' => $request->pekerjaan,
            'tanggungan' => $request->tanggungan,
            'asset' => $request->asset
        ];
        Peserta::create($pesertaData);

        if ($pesertaData['status'] == 'Diproses') {
            Comparisons::create($pesertaData);
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil ditambah');
    }

    public function approve($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Diproses']);
        $data->save();

        if ($data->status == 'Diproses') {
            Comparisons::create([
                'id_siswa' => $data->id_siswa,
                'id_beasiswa' => $data->id_beasiswa,
                'id_peserta' => $id,
                'penghasilan' => $data->penghasilan,
                'pekerjaan' => $data->pekerjaan,
                'tanggungan' => $data->tanggungan,
                'asset' => $data->asset
            ]);
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil distujui');
    }

    public function disapprove($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Ditolak']);
        $data->save();
        return redirect('/peserta')->with('success', 'Peserta berhasil ditolak');
    }

    public function delete($id)
    {
        $data = Peserta::find($id);
        $comp = Comparisons::where('id_peserta', $id);
        if ($data) {
            $data->delete();
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil dihapus');
    }

    public function detail($id)
    {
        $data = Peserta::find($id);
        $siswa = DataSiswa::where('id_user', $data->id_siswa)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data tidak ditemukan, mohon lengkapi data siswa terlebih dahulu');
        }
        return view('admin.layout.detail-peserta', compact('data', 'siswa'));
    }
}
