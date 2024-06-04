<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Peserta;
use App\Models\Comparisons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AnalisisController extends Controller
{
    public function index()
    {
        return view('admin.component.ahp.analisis');
    }

    public function postbobot(Request $request)
    {
        $pk = 1;
        $po = 1;
        $ta = 1;
        $as = 1;
        //pekerjaan
        $pkp = $request->kpkp;
        $pkt = $request->kpkt;
        $pka = $request->kpka;
        //penghasilan
        $pop = $request->kpop;
        $pot = $request->kpot;
        $poa = $request->kpoa;
        //tanggungan
        $topk = $request->ktopk;
        $top = $request->ktop;
        $toa = $request->ktoa;
        //asset
        $apk = $request->kapk;
        $at = $request->kat;
        $ap = $request->kap;

        (float) $k1 = $as;
        (float) $k2 = $pkp / $pop;
        (float) $k3 = $pkt / $topk;
        (float) $k4 = $pka / $apk;
        (float) $k5 = $pop / $pkp;
        (float) $k6 = $ta;
        (float) $k7 = $pot / $top;
        (float) $k8 = $poa / $ap;
        (float) $k9 = $topk / $pkt;
        (float) $k10 = $top / $pot;
        (float) $k11 = $pk;
        (float) $k12 = $toa / $at;
        (float) $k13 = $apk / $pka;
        (float) $k14 = $ap / $poa;
        (float) $k15 = $at / $toa;
        (float) $k16 = $po;
        (float) $k17 = $k1 + $k5 + $k9 + $k13;
        (float) $k18 = $k2 + $k6 + $k10 + $k14;
        (float) $k19 = $k3 + $k7 + $k11 + $k15;
        (float) $k20 = $k4 + $k8 + $k12 + $k16;
        return view('admin.component.ahp.index', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
        ]);
    }

    public function postmatriks(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;

        (float) $k1 = $t1 / $t17;
        (float) $k2 = $t2 / $t18;
        (float) $k3 = $t3 / $t19;
        (float) $k4 = $t4 / $t20;
        (float) $k5 = $t5 / $t17;
        (float) $k6 = $t6 / $t18;
        (float) $k7 = $t7 / $t19;
        (float) $k8 = $t8 / $t20;
        (float) $k9 = $t9 / $t17;
        (float) $k10 = $t10 / $t18;
        (float) $k11 = $t11 / $t19;
        (float) $k12 = $t12 / $t20;
        (float) $k13 = $t13 / $t17;
        (float) $k14 = $t14 / $t18;
        (float) $k15 = $t15 / $t19;
        (float) $k16 = $t16 / $t20;

        $k17 = $k1 + $k5 + $k9 + $k13;
        $k18 = $k2 + $k6 + $k10 + $k14;
        $k19 = $k3 + $k7 + $k11 + $k15;
        $k20 = $k4 + $k8 + $k12 + $k16;

        return view('admin.component.ahp.index2', [
            'k1' => number_format($k1, 2),
            'k2' => number_format($k2, 2),
            'k3' => number_format($k3, 2),
            'k4' => number_format($k4, 2),
            'k5' => number_format($k5, 2),
            'k6' => number_format($k6, 2),
            'k7' => number_format($k7, 2),
            'k8' => number_format($k8, 2),
            'k9' => number_format($k9, 2),
            'k10' => number_format($k10, 2),
            'k11' => number_format($k11, 2),
            'k12' => number_format($k12, 2),
            'k13' => number_format($k13, 2),
            'k14' => number_format($k14, 2),
            'k15' => number_format($k15, 2),
            'k16' => number_format($k16, 2),
            'k17' => round($k17),
            'k18' => round($k18),
            'k19' => round($k19),
            'k20' => round($k20),
        ]);
    }

    public function postmatriks2(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;

        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;
        $k17 = $t17;
        $k18 = $t18;
        $k19 = $t19;
        $k20 = $t20;
        $k21 = ($k1 + $k2 + $k3 + $k4) / 4;
        $k22 = ($k5 + $k6 + $k7 + $k8) / 4;
        $k23 = ($k9 + $k10 + $k11 + $k12) / 4;
        $k24 = ($k13 + $k14 + $k15 + $k16) / 4;
        $k25 = $k1 + $k2 + $k3 + $k4;
        $k26 = $k5 + $k6 + $k7 + $k8;
        $k27 = $k9 + $k10 + $k11 + $k12;
        $k28 = $k13 + $k14 + $k15 + $k16;
        $k29 = $k17 + $k18 + $k19 + $k20;
        return view('admin.component.ahp.index3', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => $k26,
            'k27' => $k27,
            'k28' => $k28,
            'k29' => $k29,
        ]);
    }

    public function cekkonsistensi(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;
        $t21 = $request->k21;
        $t22 = $request->k22;
        $t23 = $request->k23;
        $t24 = $request->k24;
        $t25 = $request->k25;
        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;

        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;

        $k17 = $t17;
        $k18 = $t18;
        $k19 = $t19;
        $k20 = $t20;
        $k21 = $t21;
        $k22 = $t22;
        $k23 = $t23;
        $k24 = $t24;
        $k25 = $t25;
        $k26 = $t26;
        $k27 = $t27;
        $k28 = $t28;

        $hs1 = ($k21 + $k25);
        $hs2 = ($k22 + $k26);
        $hs3 = ($k23 + $k27);
        $hs4 = ($k24 + $k28);
        $hs5 = ($hs1 + $hs2 + $hs3 + $hs4);

        // Menghitung lambda max 
        $lambdamax = ($hs5) / 4;

        // Menghitung CI
        $ci = ($lambdamax - 4) / (4 - 1);

        // Menghitung CR
        $cr = $ci / 0.90;
        return view('admin.component.ahp.index4', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => $k26,
            'k27' => $k27,
            'k28' => $k28,
            'hs1' => $hs1,
            'hs2' => $hs2,
            'hs3' => $hs3,
            'hs4' => $hs4,
            'hs5' => $hs5,
            'cr' => $cr,
        ]);
    }

    public function posthasilrekomendasi(Request $request)
    {
        $penghasilan = Comparisons::select('penghasilan')->orderBy('id_siswa', 'asc')->get();
        $tanggungan = Comparisons::select('tanggungan')->orderBy('id_siswa', 'asc')->get();
        $pekerjaan = Comparisons::select('pekerjaan')->orderBy('id_siswa', 'asc')->get();
        $asset = Comparisons::select('asset')->orderBy('id_siswa', 'asc')->get();

        // variabel penampung nilai kedalam array
        $datapenghasilanarr = [];
        $datatanggunganarr = [];
        $datapekerjaanarr = [];
        $datasetarr = [];

        // buat masukin data kedalam bentuk array
        foreach ($penghasilan as $itempeng) {
            $datapenghasilanarr[] = $itempeng->penghasilan;
        }
        foreach ($tanggungan as $itemtang) {
            $datatanggunganarr[] = $itemtang->tanggungan;
        }
        foreach ($pekerjaan as $itempek) {
            $datapekerjaanarr[] = $itempek->pekerjaan;
        }
        foreach ($asset as $itemas) {
            $datasetarr[] = $itemas->asset;
        }

        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;

        // kriteria penghasilan
        $hasilpeng = [];
        $hasiljmlh = 0;
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datapenghasilanarr) * sizeof($datapenghasilanarr)) + (sizeof($datapenghasilanarr) - 1); $m++) {
            if ($i < sizeof($datapenghasilanarr)) {
                $hasilpeng[$n] = $datapenghasilanarr[$i] / $datapenghasilanarr[$j];
                $i++;
                $n++;
            } else if ($j < sizeof($datapenghasilanarr)) {
                $j++;
                $i = 0;
            } else {
                // Do nothing
            }
        }

        // Jumlah kolom dan baris
        $barispeng = sizeof($datapenghasilanarr);
        $kolompeng = sizeof($datapenghasilanarr);
        $data2Dpeng = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barispeng; $i++) {
            for ($j = 0; $j < $kolompeng; $j++) {
                $data2Dpeng[$i][$j] = $hasilpeng[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlh = array();
        for ($i = 0; $i < $kolompeng; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barispeng; $j++) {
                $jumlah += $data2Dpeng[$j][$i];
            }
            $hasiljmlh[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgh = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datapenghasilanarr) * sizeof($datapenghasilanarr)) + (sizeof($datapenghasilanarr) - 1); $m++) {
            if ($i < sizeof($datapenghasilanarr)) {
                $hasilbgh[$z] = $hasilpeng[$z] / $hasiljmlh[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barispeng; $i++) {
            for ($j = 0; $j < $kolompeng; $j++) {
                $data2Dbgh[$i][$j] = $hasilbgh[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmh = [];
        $i = 0;
        for ($j = 0; $j < $barispeng; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolompeng; $i++) {
                $jumlah += $data2Dbgh[$j][$i];
            }
            $hasiltmh[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datapenghasilanarr); $i++) {
            $jumlah = $hasiltmh[$i] / sizeof($datapenghasilanarr);
            $hasilpmh[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datapenghasilanarr); $i++) {
            $jumlah = $hasilpmh[$i] * $t26;
            $hasilppmh[] = $jumlah;
        }

        // kriteria tanggungan
        $hasiltang = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datatanggunganarr) * sizeof($datatanggunganarr)) + (sizeof($datatanggunganarr) - 1); $m++) {
            if ($i < sizeof($datatanggunganarr)) {
                $hasiltang[$n] = $datatanggunganarr[$i] / $datatanggunganarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datatanggunganarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisl = sizeof($datatanggunganarr);
        $koloml = sizeof($datatanggunganarr);
        $data2Dl = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dl[$i][$j] = $hasiltang[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmll = array();
        for ($i = 0; $i < $koloml; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisl; $j++) {
                $jumlah += $data2Dl[$j][$i];
            }
            $hasiljmll[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgl = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datatanggunganarr) * sizeof($datatanggunganarr)) + (sizeof($datatanggunganarr) - 1); $m++) {
            if ($i < sizeof($datatanggunganarr)) {
                $hasilbgl[$z] = $hasiltang[$z] / $hasiljmll[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dbgl[$i][$j] = $hasilbgl[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltml = [];
        $i = 0;
        for ($j = 0; $j < $barisl; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloml; $i++) {
                $jumlah += $data2Dbgl[$j][$i];
            }
            $hasiltml[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datatanggunganarr); $i++) {
            $jumlah = $hasiltml[$i] / sizeof($datatanggunganarr);
            $hasilpml[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datatanggunganarr); $i++) {
            $jumlah = $hasilpml[$i] * $t27;
            $hasilppml[] = $jumlah;
        }
        // asset
        $hasias = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datasetarr) * sizeof($datasetarr)) + (sizeof($datasetarr) - 1); $m++) {
            if ($i < sizeof($datasetarr)) {
                $hasias[$n] = $datasetarr[$i] / $datasetarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datasetarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $bariss = sizeof($datasetarr);
        $koloms = sizeof($datasetarr);
        $data2Ds = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Ds[$i][$j] = $hasias[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmas = array();
        for ($i = 0; $i < $koloms; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $bariss; $j++) {
                $jumlah += $data2Ds[$j][$i];
            }
            $hasiljmas[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgs = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datasetarr) * sizeof($datasetarr)) + (sizeof($datasetarr) - 1); $m++) {
            if ($i < sizeof($datasetarr)) {
                $hasilbgs[$z] = $hasias[$z] / $hasiljmas[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Dbgs[$i][$j] = $hasilbgs[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltms = [];
        $i = 0;
        for ($j = 0; $j < $bariss; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloms; $i++) {
                $jumlah += $data2Dbgs[$j][$i];
            }
            $hasiltms[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datasetarr); $i++) {
            $jumlah = $hasiltms[$i] / sizeof($datasetarr);
            $hasilpms[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datasetarr); $i++) {
            $jumlah = $hasilpms[$i] * $t28;
            $hasilppms[] = $jumlah;
        }

        $hasilk = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datasetarr) * sizeof($datasetarr)) + (sizeof($datasetarr) - 1); $m++) {
            if ($i < sizeof($datasetarr)) {
                $hasilk[$n] = $datasetarr[$i] / $datasetarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datasetarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisk = sizeof($datasetarr);
        $kolomk = sizeof($datasetarr);
        $data2Dk = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dk[$i][$j] = $hasilk[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlk = array();
        for ($i = 0; $i < $kolomk; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisk; $j++) {
                $jumlah += $data2Dk[$j][$i];
            }
            $hasiljmlk[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgk = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datasetarr) * sizeof($datasetarr)) + (sizeof($datasetarr) - 1); $m++) {
            if ($i < sizeof($datasetarr)) {
                $hasilbgk[$z] = $hasilk[$z] / $hasiljmlk[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dbgk[$i][$j] = $hasilbgk[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmk = [];
        $i = 0;
        for ($j = 0; $j < $barisk; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolomk; $i++) {
                $jumlah += $data2Dbgk[$j][$i];
            }
            $hasiltmk[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datasetarr); $i++) {
            $jumlah = $hasiltmk[$i] / sizeof($datasetarr);
            $hasilpmk[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datasetarr); $i++) {
            $jumlah = $hasilpmk[$i] * $t28;
            $hasilppmk[] = $jumlah;
        }

        $tipe = DB::table('pesertas')
            ->select('id_siswa')
            ->get();
        $beasiswa = DB::table('pesertas')
            ->select('id_beasiswa')
            ->get();

        $penghasilant = DB::table('pesertas')
            ->select('penghasilan')
            ->get();
        $tanggungant = DB::table('pesertas')
            ->select('tanggungan')
            ->get();
        $pekerjaant = DB::table('pesertas')
            ->select('pekerjaan')
            ->get();
        $asset = DB::table('pesertas')
            ->select('asset')
            ->get();

        for ($i = 0; $i < sizeof($datapenghasilanarr); $i++) {
            $hasiljumlah[] = $hasilppmh[$i] + $hasilppml[$i] + $hasilppmk[$i] + $hasilppms[$i];
        }

        $kota = DB::table('beasiswas')
            ->select('kuota')
            ->limit(1)
            ->get();

        for ($i = 0; $i < sizeof($datapenghasilanarr); $i++) {
            if (isset($tipe[$i], $penghasilant[$i], $tanggungant[$i], $pekerjaant[$i], $asset[$i], $hasiljumlah[$i])) {
                Hasil::create([
                    'id_siswa' => $tipe[$i]->id_siswa,
                    'id_beasiswa' => $beasiswa[$i]->id_beasiswa,
                    'penghasilan' => $penghasilant[$i]->penghasilan,
                    'tanggungan' => $tanggungant[$i]->tanggungan,
                    'pekerjaan' => $pekerjaant[$i]->pekerjaan,
                    'asset' => $asset[$i]->asset,
                    'ahp' => $hasiljumlah[$i]
                ]);

                if ($i < $kota[0]->kuota) {
                    DB::table('pesertas')
                        ->where('id_siswa', $tipe[$i]->id_siswa)
                        ->update(['status' => 'Lolos']);
                } else {
                    DB::table('pesertas')
                        ->where('id_siswa', $tipe[$i]->id_siswa)
                        ->update(['status' => 'Tidak Lolos']);
                }
            } else {
            }
        }

        $datahasil = Hasil::all();

        $datamax = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->get();

        return view('admin.component.ahp.hasil', [
            'data_hasil' => $datahasil,
            'data_max' => $datamax
        ]);
    }
}
