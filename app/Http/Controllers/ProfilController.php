<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Kelas;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data = DataSiswa::all();
        $user = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        return view('admin.component.profil', compact('data', 'user', 'kelas'));
    }

    public function store(Request $request, $id)
    {
        $user = User::where('name', $request->nama)->first();

        $file = $request->file('sktm');
        $ext = $file->getClientOriginalExtension();
        $sktmname = time() . '.' . $ext;
        $file->move('file/sktm', $sktmname);

        $file = $request->file('dok_lainnya');
        $ext = $file->getClientOriginalExtension();
        $dokname = time() . '.' . $ext;
        $file->move('file/dok_lainnya', $dokname);

        $daftar = [
            'id_beasiswa' => $id,
            'id_siswa' => $user->id,
            'id_kelas' => $request->id_kelas,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'tanggungan' => $request->tanggungan,
            'asset' => $request->asset,
            'status' => "Mendaftar",
            'sktm' => $sktmname,
            'dok_lainnya' => $dokname,
        ];
        Peserta::create($daftar);

        $cekNis = DataSiswa::where('nis', $request->nis)->first();
        $cekIdUser = DataSiswa::where('id_user', $request->id_user)->first();

        if ($cekNis || $cekIdUser) {
            return redirect('/dashboard')->with('success', 'Berhasil mendaftar.');
        }
        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'id_kelas' => $request->id_kelas,
            'id_user' => $user->id,
        ];
        DataSiswa::create($data);
        $user->status = 'lengkap';
        $user->save();

        return redirect('/dashboard')->with('success', 'Berhasil mendaftar beasiswa.');
    }

    public function update(Request $request, $id)
    {
        $user = User::where('name', $request->nama)->first();
        $data = DataSiswa::find($id);
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->semester = $request->semester;
        $data->tahun_masuk = $request->tahun_masuk;
        $data->alamat = $request->alamat;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->nama_ayah = $request->nama_ayah;
        $data->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data->anak_ke = $request->anak_ke;
        $data->saudara = $request->saudara;
        $data->id_kelas = $request->id_kelas;
        $data->id_user = $user->id;
        $data->save();
        return redirect('/profil-siswa')->with('success', 'Data Siswa Berhasil diupdate.');
    }

    public function delete($id)
    {
        $data = DataSiswa::find($id);
        $data->delete();
        return redirect('/profil-siswa')->with('success', 'Data Siswa Berhasil di hapus.');
    }
}
