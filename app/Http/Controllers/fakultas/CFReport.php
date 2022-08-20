<?php

namespace App\Http\Controllers\fakultas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\questioner;
use App\Models\Status;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CFReport extends Controller
{
    public function index()
    {
        return  view('fakultas/report/vf_report_status',);
    }

    public function masatunggu()
    {
        return  view('fakultas/report/vf_report_masatunggu');
    }
    public function pendapatan()
    {
        return  view('fakultas/report/vf_report_masatunggu');
    }

    public function jtb()
    {
        return  view('fakultas/report/vf_report_jtb');
    }

    public function ttb()
    {
        return  view('fakultas/report/vf_report_ttb');
    }

    public function sdk()
    {
        return  view('fakultas/report/vf_report_sdk');
    }

    public function vertikal()
    {
        return  view('fakultas/report/vf_report_vertikal');
    }

    public function horizontal()
    {
        return  view('fakultas/report/vf_report_horizontal');
    }

    public function ikusatu()
    {
        return  view('fakultas/report/vf_report_ikusatu');
    }

    public function kompetensi()
    {
        return  view('fakultas/report/vf_report_kompetensi');
    }

    public function penghasilan()
    {
        return  view('fakultas/report/vf_report_penghasilan');
    }

    public function jumlah_responden()
    {
        return  view('fakultas/report/vf_report_jumlah_responden');
    }


    public function hasilstatus(Request $request)
    {
        $jreport = $request->jreport;
        $tahun = $request->tahun;
        // $kd_univ = $request->kd_univ;
        // $kelompok = $request->kelompok;

        if (request()->ajax()) {
            return Datatables::of(questioner::with('prodi')->get())->addIndexColumn()->addColumn('nama_prodi', function ($data) {
                $btn = $data->prodi->nama_prodi ?? "None";
                return $btn;
            })->make(true);
        }
        if ($jreport == 'status') {
            $nilaijreport = 'Status';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_status')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $bekerja = $dataumum->where('f8', 1);
                    $nialibekerja = count($bekerja);

                    $wiraswasta = $dataumum->where('f8', 3);
                    $nialiwiraswasta = count($wiraswasta);

                    $lanjut = $dataumum->where('f8', 4);
                    $nialilanjut = count($lanjut);

                    $tdkkerja  = $dataumum->where('f8', 5);
                    $nialitdkkerja = count($tdkkerja);

                    $blmkerja  = $dataumum->where('f8', 2);
                    $nialiblmkerja = count($blmkerja);

                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    $nilai_total = $nialibekerja + $nialiwiraswasta;
                    $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);


                    $status = Status::all();
                    $statusarray = array();

                    foreach ($status as $key => $value) {
                        $statusarray[] = $value->nama_status;
                    }
                    // dd($statusarray);

                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialibekerjapersen, $nialiwiraswastapersen, $nialilanjutpersen, $nialitdkkerjapersen, $nialiblmkerjapersen])
                        ->setLabels(['Bekerja (full time/part time) (%) ', 'Wiraswasta (%) ', 'Melanjutkan Pendidikan (%) ', 'Tidak Kerja tetapi sedang mencari kerja (%) ', 'Belum memungkinkan bekerja (%) '])->setHeight(500)->setWidth(550);

                    $chartdua = (new LarapexChart)->barChart()
                        ->addData('Bekerja (full time/part time)', [$nialibekerja])
                        ->addData('Wiraswasta', [$nialiwiraswasta])
                        ->addData('Melanjutkan Pendidikan', [$nialilanjut])
                        ->addData('Tidak Kerja tetapi sedang mencari kerja', [$nialitdkkerja])
                        ->addData('Belum memungkinkan bekerja', [$nialiblmkerja])
                        ->setXAxis(['2020'])->setHeight(300)->setWidth(500);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'dataprodi', 'bekerja', 'wiraswasta', 'lanjut', 'tdkkerja', 'blmkerja', 'no', 'nialin', 'jreport', 'nilaijreport'));
                }
            }
        } elseif ($jreport == 'masatunggu') {
            $kelompok = $request->kelompok;

            $nilaijreport = 'Masa Tunggu';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_masatunggu')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                if ($kelompok == 'univ') {
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->get()
                        ->where('tahun_lulus', $tahun);

                    // dd($bekerja);
                    $nilaiumum = count($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_masatunggu')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {
                        $bawah = $dataumum->where('f504', 1);
                        $nilaibawah = count($bawah);

                        $atas = $dataumum->where('f504', 2);
                        $nilaiatas = count($atas);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);

                        $datamedian = $nialin;

                        foreach ($n as $value) {
                            if ($value->f502 != '') {
                                $nilaim[] = $value->f502;
                            } else {
                                $nilaim[] = $value->f506;
                            }
                        }


                        $scoresMedian = collect($nilaim)->median();
                        // dd($nilaim);


                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nilaibawah, $nilaiatas])
                            ->setLabels(['Mendapatkan pekerjaan <= 6 bulan', 'Mendapatkan pekerjaan > 6 bulan'])->setHeight(500)->setWidth(550);

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Mendapatkan pekerjaan <= 6 bulan', [$nilaibawah])
                            ->addData('Mendapatkan pekerjaan > 6 bulan', [$nilaiatas])
                            ->setXAxis([$tahun])->setHeight(300);

                        // $dataprodi = DB::table('prodis')
                        //     ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        //     ->orderBy('urutan')
                        //     ->get();
                        $datauniv = DB::table('univs')->get();

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'datauniv', 'nilaibawah', 'nilaiatas', 'no', 'nialin', 'jreport', 'nilaijreport', 'bawah', 'atas', 'kelompok', 'scoresMedian'));
                    }
                } else if ($kelompok == 'fakultas') {
                    $datafakultas = DB::table('fakultas')
                        ->orderBy('urutan')
                        ->get();
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->join('prodis', 'prodis.kode_prodi', '=', 'questioners.kdpstmsmh')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->get()
                        ->where('tahun_lulus', $tahun);

                    // dd($bekerja);
                    $nilaiumum = count($dataumum);

                    // dd($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {
                        $bawah = $dataumum->where('f504', 1);
                        $nilaibawah = count($bawah);

                        $atas = $dataumum->where('f504', 2);
                        $nilaiatas = count($atas);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);
                        //median
                        $datamedian = $nialin;

                        foreach ($n as $value) {
                            if ($value->f502 != '') {
                                $nilaim[] = $value->f502;
                            } else {
                                $nilaim[] = $value->f506;
                            }
                        }


                        $scoresMedian = collect($nilaim)->median();
                        // dd($nilaim);

                        //median

                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nilaibawah, $nilaiatas])
                            ->setLabels(['Mendapatkan pekerjaan <= 6 bulan', 'Mendapatkan pekerjaan > 6 bulan'])->setHeight(500)->setWidth(550);




                        foreach ($n->where('kd_fak', '02') as $value) {
                            if ($value->f502 != '') {
                                $nilaim2[] = $value->f502;
                            } else {
                                $nilaim2[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '03') as $value) {
                            if ($value->f502 != '') {
                                $nilaim3[] = $value->f502;
                            } else {
                                $nilaim3[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '04') as $value) {
                            if ($value->f502 != '') {
                                $nilaim4[] = $value->f502;
                            } else {
                                $nilaim4[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '05') as $value) {
                            if ($value->f502 != '') {
                                $nilaim5[] = $value->f502;
                            } else {
                                $nilaim5[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '06') as $value) {
                            if ($value->f502 != '') {
                                $nilaim6[] = $value->f502;
                            } else {
                                $nilaim6[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '07') as $value) {
                            if ($value->f502 != '') {
                                $nilaim7[] = $value->f502;
                            } else {
                                $nilaim7[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '08') as $value) {
                            if ($value->f502 != '') {
                                $nilaim8[] = $value->f502;
                            } else {
                                $nilaim8[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '09') as $value) {
                            if ($value->f502 != '') {
                                $nilaim9[] = $value->f502;
                            } else {
                                $nilaim9[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '10') as $value) {
                            if ($value->f502 != '') {
                                $nilaim10[] = $value->f502;
                            } else {
                                $nilaim10[] = $value->f506;
                            }
                        }
                        $nilaim01 = array();
                        foreach ($n->where('kd_fak', '01') as $value) {
                            if ($value->f502 != '') {
                                $nilaim01[] = $value->f502;
                            } else {
                                $nilaim01[] = 1;
                            }
                        }
                        $nilaim90 = array();
                        foreach ($n->where('kd_fak', '90') as $value) {
                            if ($value->f502 != '') {
                                $nilaim90[] = $value->f502;
                            } else {
                                $nilaim90[] = $value->f506;
                            }
                        }

                        $scoresMedian2 = collect($nilaim2)->median();
                        $scoresMedian3 = collect($nilaim3)->median();
                        $scoresMedian4 = collect($nilaim4)->median();
                        $scoresMedian5 = collect($nilaim5)->median();
                        $scoresMedian6 = collect($nilaim6)->median();
                        $scoresMedian7 = collect($nilaim7)->median();
                        $scoresMedian8 = collect($nilaim8)->median();
                        $scoresMedian9 = collect($nilaim9)->median();
                        $scoresMedian10 = collect($nilaim10)->median();
                        $scoresMedian01 = collect($nilaim01)->median();
                        $scoresMedian90 = collect($nilaim90)->median();


                        $medianfak[] = $scoresMedian2;
                        $medianfak[] = $scoresMedian3;
                        $medianfak[] = $scoresMedian4;
                        $medianfak[] = $scoresMedian5;
                        $medianfak[] = $scoresMedian6;
                        $medianfak[] = $scoresMedian7;
                        $medianfak[] = intval($scoresMedian8);
                        $medianfak[] = $scoresMedian9;
                        $medianfak[] = $scoresMedian10;
                        $medianfak[] = $scoresMedian01;
                        $medianfak[] = $scoresMedian90;

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Mendapatkan pekerjaan <= 6 bulan', [count($bawah->where('kd_fak', '02')), count($bawah->where('kd_fak', '03')), count($bawah->where('kd_fak', '04')), count($bawah->where('kd_fak', '05')), count($bawah->where('kd_fak', '06')), count($bawah->where('kd_fak', '07')), count($bawah->where('kd_fak', '08')), count($bawah->where('kd_fak', '09')), count($bawah->where('kd_fak', '10')), count($bawah->where('kd_fak', '01')), count($bawah->where('kd_fak', '90'))])
                            ->addData('Mendapatkan pekerjaan > 6 bulan', [count($atas->where('kd_fak', '02')), count($atas->where('kd_fak', '03')), count($atas->where('kd_fak', '04')), count($atas->where('kd_fak', '05')), count($atas->where('kd_fak', '06')), count($atas->where('kd_fak', '07')), count($atas->where('kd_fak', '08')), count($atas->where('kd_fak', '09')), count($atas->where('kd_fak', '10')), count($atas->where('kd_fak', '01')), count($atas->where('kd_fak', '90'))])
                            ->setXAxis(['FMIPA', 'FT', 'FIK', 'FIP', 'FBS', 'FISH', 'FPSI', 'FSD', 'FE', 'PPS', '	PROFESI']);

                        // dd($medianfak);
                        //median2
                        $no = 1;
                        $noa = 0;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'datafakultas',  'no', 'nialin', 'jreport', 'nilaijreport', 'kelompok', 'bawah', 'atas', 'medianfak', 'noa'));
                    }
                } else if ($kelompok == 'prodi') {
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->get()
                        ->where('tahun_lulus', $tahun);

                    // dd($bekerja);
                    $nilaiumum = count($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {
                        $bawah = $dataumum->where('f504', 1);
                        $nilaibawah = count($bawah);

                        $atas = $dataumum->where('f504', 2);
                        $nilaiatas = count($atas);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);
                        //median
                        $datamedian = $nialin;

                        foreach ($n as $value) {
                            if ($value->f502 != '') {
                                $nilaim[] = $value->f502;
                            } else {
                                $nilaim[] = $value->f506;
                            }
                        }


                        $scoresMedian = collect($nilaim)->median();
                        // dd($nilaim);

                        //median

                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nilaibawah, $nilaiatas])
                            ->setLabels(['Mendapatkan pekerjaan <= 6 bulan', 'Mendapatkan pekerjaan > 6 bulan'])->setHeight(500)->setWidth(550);

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Mendapatkan pekerjaan <= 6 bulan', [$nilaibawah])
                            ->addData('Mendapatkan pekerjaan > 6 bulan', [$nilaiatas])
                            ->setXAxis([$tahun])->setHeight(300);

                        $dataprodi = DB::table('prodis')
                            ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                            ->orderBy('urutan')
                            ->get();


                        // dd($dataprodi);
                        //median2
                        $n2 = $n->where('kdpstmsmh', '87205');

                        foreach ($n2 as $value) {
                            if ($value->f502 != '') {
                                $nilaim2[] = $value->f502;
                            } else {
                                $nilaim2[] = $value->f506;
                            }
                        }


                        $scoresMedian2 = collect($nilaim2)->median();

                        // dd($scoresMedian2);

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'dataprodi',  'no', 'nialin', 'jreport', 'nilaijreport', 'kelompok', 'bawah', 'atas',));
                    }
                }
            }
        } elseif ($jreport == 'penghasilan') {
            $nilaijreport = 'Penghasilan';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_penghasilan')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_penghasilan')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f505', '>', 0)->where('f505', '<=', 1000000);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f505', '>', 1000000)->where('f505', '<=', 3000000);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f505', '>', 3000000)->where('f505', '<=', 5000000);
                    $nialidatac3 = count($datac3);

                    $datac4 = $dataumum->where('f505', '>', 5000000);
                    $nialidatac4 = count($datac4);

                    $datac5 = $dataumum->where('f505', '==', '');
                    $nialidatac5 = count($datac5);

                    $n = $dataumum->where('f505', '!=', '');
                    $nialin = count($n);

                    $status = Status::all();
                    $statusarray = array();

                    foreach ($status as $key => $value) {
                        $statusarray[] = $value->nama_status;
                    }

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact(
                        'dataprodi',
                        'datac1',
                        'datac2',
                        'datac3',
                        'datac4',
                        'datac5',
                        'n',
                        'no',
                        'nialin',
                        'jreport',
                        'nilaijreport'
                    ));
                }
            }
        } elseif ($jreport == 'jtb') {
            $kelompok = $request->kelompok;
            $nilaijreport = 'Jenis Tempat Bekerja';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_jtb')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {

                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->join('prodis', 'prodis.kode_prodi', '=', 'questioners.kdpstmsmh')
                    ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_jtb')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    if ($kelompok == 'univ') {
                        $datac1 = $dataumum->where('f1101', 1);
                        $nialidatac1 = count($datac1);

                        $datac2 = $dataumum->where('f1101', 6);
                        $nilaidatac2 = count($datac2);

                        $datac3 = $dataumum->where('f1101', 7);
                        $nialidatac3 = count($datac3);

                        $datac4  = $dataumum->where('f1101', 2);
                        $nialidatac4 = count($datac4);

                        $datac5  = $dataumum->where('f1101', 3);
                        $nialidatac5 = count($datac5);

                        $datac6  = $dataumum->where('f1101', 4);
                        $nialidatac6 = count($datac6);

                        $datac7  = $dataumum->where('f1101', 5);
                        $nialidatac7 = count($datac7);

                        $n = $dataumum->where('f1101', '!=', '');
                        $nialin = count($n);

                        $nialidatac1persen = round($nialidatac1 / $nialin  * 100);
                        $nilaidatac2persen = round($nilaidatac2 / $nialin  * 100);
                        $nialidatac3persen = round($nialidatac3 / $nialin  * 100);
                        $nialidatac4persen = round($nialidatac4 / $nialin  * 100);
                        $nialidatac5persen = round($nialidatac5 / $nialin  * 100);
                        $nialidatac6persen = round($nialidatac6 / $nialin  * 100);
                        $nialidatac7persen = round($nialidatac7 / $nialin  * 100);


                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nilaidatac2persen, $nialidatac3persen, $nialidatac4persen, $nialidatac5persen, $nialidatac6persen, $nialidatac7persen])
                            ->setLabels(['Instansi pemerintah (%) ', 'BUMN/BUMD (%) ', 'Institusi/Organisasi Multilateral (%) ', 'Organisasi non-profit/ LSM (%) ', 'Perusahaan swasta (%) ', 'Wiraswasta (%) ', 'Lainnya (%) '])->setHeight(300);

                        // $chartdua = (new LarapexChart)->barChart()
                        //     ->addData('Bekerja (full time/part time)', [$nialibekerja])
                        //     ->addData('Wiraswasta', [$nialiwiraswasta])
                        //     ->addData('Melanjutkan Pendidikan', [$nialilanjut])
                        //     ->addData('Tidak Kerja tetapi sedang mencari kerja', [$nialitdkkerja])
                        //     ->addData('Belum memungkinkan bekerja', [$nialiblmkerja])
                        //     ->setXAxis(['2020'])->setHeight(300)->setWidth(500);

                        $dataprodi = DB::table('prodis')
                            ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                            ->orderBy('urutan')
                            ->get();

                        $datauniv = DB::table('univs')->get();

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact(
                            'chart',
                            'dataprodi',
                            'datac1',
                            'datac2',
                            'datac3',
                            'datac4',
                            'datac5',
                            'datac6',
                            'datac7',
                            'nialidatac1',
                            'nilaidatac2',
                            'nialidatac3',
                            'nialidatac4',
                            'nialidatac5',
                            'nialidatac6',
                            'nialidatac7',
                            'no',
                            'nialin',
                            'jreport',
                            'nilaijreport',
                            'datauniv',
                            'kelompok'
                        ));
                    } elseif ($kelompok == 'fakultas') {
                        $datac1 = $dataumum->where('f1101', 1);
                        $nialidatac1 = count($datac1);

                        $datac2 = $dataumum->where('f1101', 6);
                        $nilaidatac2 = count($datac2);

                        $datac3 = $dataumum->where('f1101', 7);
                        $nialidatac3 = count($datac3);

                        $datac4  = $dataumum->where('f1101', 2);
                        $nialidatac4 = count($datac4);

                        $datac5  = $dataumum->where('f1101', 3);
                        $nialidatac5 = count($datac5);

                        $datac6  = $dataumum->where('f1101', 4);
                        $nialidatac6 = count($datac6);

                        $datac7  = $dataumum->where('f1101', 5);
                        $nialidatac7 = count($datac7);

                        $n = $dataumum->where('f1101', '!=', '');
                        $nialin = count($n);

                        $datafakultas = DB::table('fakultas')
                            ->orderBy('urutan')
                            ->get();

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact(
                            'datac1',
                            'datac2',
                            'datac3',
                            'datac4',
                            'datac5',
                            'datac6',
                            'datac7',
                            'nialidatac1',
                            'nilaidatac2',
                            'nialidatac3',
                            'nialidatac4',
                            'nialidatac5',
                            'nialidatac6',
                            'nialidatac7',
                            'no',
                            'nialin',
                            'jreport',
                            'nilaijreport',
                            'datafakultas',
                            'kelompok'

                        ));
                    } elseif ($kelompok == 'prodi') {
                        $datac1 = $dataumum->where('f1101', 1);
                        $nialidatac1 = count($datac1);

                        $datac2 = $dataumum->where('f1101', 6);
                        $nilaidatac2 = count($datac2);

                        $datac3 = $dataumum->where('f1101', 7);
                        $nialidatac3 = count($datac3);

                        $datac4  = $dataumum->where('f1101', 2);
                        $nialidatac4 = count($datac4);

                        $datac5  = $dataumum->where('f1101', 3);
                        $nialidatac5 = count($datac5);

                        $datac6  = $dataumum->where('f1101', 4);
                        $nialidatac6 = count($datac6);

                        $datac7  = $dataumum->where('f1101', 5);
                        $nialidatac7 = count($datac7);

                        $n = $dataumum->where('f1101', '!=', '');
                        $nialin = count($n);

                        $dataprodi = DB::table('prodis')
                            ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                            ->orderBy('urutan')
                            ->get();

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact(
                            'datac1',
                            'datac2',
                            'datac3',
                            'datac4',
                            'datac5',
                            'datac6',
                            'datac7',
                            'nialidatac1',
                            'nilaidatac2',
                            'nialidatac3',
                            'nialidatac4',
                            'nialidatac5',
                            'nialidatac6',
                            'nialidatac7',
                            'no',
                            'nialin',
                            'jreport',
                            'nilaijreport',
                            'dataprodi',
                            'kelompok'

                        ));
                    }
                }
            }
        } elseif ($jreport == 'ttb') {
            $nilaijreport = 'Tingkat Tempat Bekerja';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_ttb')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f5d', 1);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f5d', 2);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f5d', 3);
                    $nialidatac3 = count($datac3);


                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    $nialidatac1persen = round($nialidatac1 / $nialin  * 100);
                    $nialidatac2persen = round($nialidatac2 / $nialin  * 100);
                    $nialidatac3persen = round($nialidatac3 / $nialin  * 100);

                    $status = Status::all();
                    $statusarray = array();

                    foreach ($status as $key => $value) {
                        $statusarray[] = $value->nama_status;
                    }
                    // dd($statusarray);

                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                        ->setLabels(['Lokal/Wilayah/Wiraswasta tidak berbadan Hukum (%) ', 'Nasional/Wiraswasta Berbadan Hukum (%) ', 'Multinasional/Internasional (%) '])->setHeight(500)->setWidth(550);

                    $chartdua = (new LarapexChart)->barChart()
                        ->addData('Lokal/Wilayah/Wiraswasta tidak berbadan Hukum', [$nialidatac1])
                        ->addData('Nasional/Wiraswasta Berbadan Hukum', [$nialidatac2])
                        ->addData('Multinasional/Internasional', [$nialidatac3])
                        ->setXAxis([$tahun])->setHeight(200)->setWidth(500);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'dataprodi', 'datac1', 'datac2', 'datac3', 'no', 'nialin', 'jreport', 'nilaijreport'));
                }
            }
        } elseif ($jreport == 'sdk') {
            $nilaijreport = 'Sumber Dana Kuliah';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_ttb')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_sdk')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f1201', 1);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f1201', 2);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f1201', 3);
                    $nialidatac3 = count($datac3);

                    $datac4 = $dataumum->where('f1201', 4);
                    $nialidatac4 = count($datac4);

                    $datac5 = $dataumum->where('f1201', 5);
                    $nialidatac5 = count($datac5);

                    $datac6 = $dataumum->where('f1201', 6);
                    $nialidatac6 = count($datac6);

                    $datac7 = $dataumum->where('f1201', 7);
                    $nialidatac7 = count($datac7);


                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    $nialidatac1persen = round($nialidatac1 / $nialin  * 100);
                    $nialidatac2persen = round($nialidatac2 / $nialin  * 100);
                    $nialidatac3persen = round($nialidatac3 / $nialin  * 100);
                    $nialidatac4persen = round($nialidatac4 / $nialin  * 100);
                    $nialidatac5persen = round($nialidatac5 / $nialin  * 100);
                    $nialidatac6persen = round($nialidatac6 / $nialin  * 100);
                    $nialidatac7persen = round($nialidatac7 / $nialin  * 100);


                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                        ->setLabels(['Biaya Sendiri / Keluarga (%)', 'Beasiswa ADIK (%)', 'Beasiswa BIDIKMISI (%)', 'Beasiswa PPA (%)', 'Beasiswa AFIRMASI (%)', 'Beasiswa Perusahaan/Swasta (%)', 'Lainnya (%)'])->setHeight(500)->setWidth(550);

                    $chartdua = (new LarapexChart)->barChart()
                        ->addData('Biaya Sendiri / Keluarga (%)', [$nialidatac1])
                        ->addData('Beasiswa ADIK (%)', [$nialidatac2])
                        ->addData('Beasiswa BIDIKMISI (%)', [$nialidatac3])
                        ->addData('Beasiswa PPA (%)', [$nialidatac4])
                        ->addData('Beasiswa AFIRMASI (%)', [$nialidatac5])
                        ->addData('Beasiswa Perusahaan/Swasta (%)', [$nialidatac6])
                        ->addData('Lainnya (%)', [$nialidatac7])
                        ->setXAxis([$tahun])->setHeight(200)->setWidth(500);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact(
                        'chart',
                        'chartdua',
                        'dataprodi',
                        'datac1',
                        'datac2',
                        'datac3',
                        'datac4',
                        'datac5',
                        'datac6',
                        'datac7',
                        'no',
                        'nialin',
                        'jreport',
                        'nilaijreport'
                    ));
                }
            }
        } elseif ($jreport == 'vertikal') {
            $nilaijreport = 'Keselarasan Vertikal (Kesesuaian Tingkat Pendidikan dengan Pekerjaan)';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_vertikal')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_vertikal')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f15', 1);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f15', 2);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f15', '=>', 3);
                    $nialidatac3 = count($datac3);



                    $n = $dataumum->where('f15', '!=', '');
                    $nialin = count($n);

                    $nialidatac1persen = round($nialidatac1 / $nialin  * 100);
                    $nialidatac2persen = round($nialidatac2 / $nialin  * 100);
                    $nialidatac3persen = round($nialidatac3 / $nialin  * 100);


                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                        ->setLabels(['Tinggi (%)', 'Sama (%)', 'Rendah (%)',])->setHeight(200)->setWidth(550);

                    $chartdua = (new LarapexChart)->barChart()
                        ->addData('Tinggi', [$nialidatac1])
                        ->addData('Sama', [$nialidatac2])
                        ->addData('Rendah', [$nialidatac3])
                        ->setXAxis([$tahun])->setHeight(200)->setWidth(500);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact(
                        'chart',
                        'chartdua',
                        'dataprodi',
                        'datac1',
                        'datac2',
                        'datac3',
                        'no',
                        'nialin',
                        'jreport',
                        'nilaijreport'
                    ));
                }
            }
        } elseif ($jreport == 'horizontal') {
            $nilaijreport = 'Keselarasan Horizontal (Kesesuaian Bidang Ilmu dengan Pekerjaan)';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_horizontal')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_horizontal')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f14', '=<', 2);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f14', 3);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f14', '=>', 4);
                    $nialidatac3 = count($datac3);



                    $n = $dataumum->where('f14', '!=', '');
                    $nialin = count($n);

                    $nialidatac1persen = round($nialidatac1 / $nialin  * 100);
                    $nialidatac2persen = round($nialidatac2 / $nialin  * 100);
                    $nialidatac3persen = round($nialidatac3 / $nialin  * 100);


                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                        ->setLabels(['Tinggi (%)', 'Sedang (%)', 'Rendah (%)',])->setHeight(200)->setWidth(550);

                    $chartdua = (new LarapexChart)->barChart()
                        ->addData('Tinggi', [$nialidatac1])
                        ->addData('Sedang', [$nialidatac2])
                        ->addData('Rendah', [$nialidatac3])
                        ->setXAxis([$tahun])->setHeight(200)->setWidth(500);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact(
                        'chart',
                        'chartdua',
                        'dataprodi',
                        'datac1',
                        'datac2',
                        'datac3',
                        'no',
                        'nialin',
                        'jreport',
                        'nilaijreport'
                    ));
                }
            }
        } elseif ($jreport == 'ikusatu') {
            $kelompok = $request->kelompok;
            // return  view('fakultas/report/vf_report_ikusatu')->with('successMsg', 'Sedang Maintenance');

            $nilaijreport = 'Kesesuaian IKU 1';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_ikusatu')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                if ($kelompok == 'univ') {
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->join('provinsis', 'provinsis.id_wil', '=', 'questionersatus.f5a1')
                        ->get()
                        ->where('tahun_lulus', $tahun);


                    $nilaiumum = count($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_ikusatu')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {

                        $datac1 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1 WHERE f505 >= umph && f502 <= 6 && f8 = 1 && tahun_lulus = ' . $tahun;
                        $datac1n = DB::select(DB::raw($datac1));
                        $nilaidatac1 = count($datac1n);

                        $datac2 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1 WHERE f505 >= umph && f502 <= 6 && f8 = 3 && tahun_lulus =' . $tahun;
                        $datac2n = DB::select(DB::raw($datac2));
                        $nilaidatac2 = count($datac2n);



                        //masih keliru query
                        $datac3 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners   WHERE f8 = 4 && tahun_lulus =' . $tahun;
                        $datac3n = DB::select(DB::raw($datac3));
                        $nilaidatac3 = count($datac3n);

                        // return $nilaidatac3;
                        // dd($nilaidatac3);



                        $nialin = $nilaidatac1 +  $nilaidatac2 + $nilaidatac3;

                        $presentasetotal = round($nialin * 100 / 4161);


                        $nialidatac1persen = round($nilaidatac1 / $nialin  * 100);
                        $nialidatac2persen = round($nilaidatac2 / $nialin  * 100);
                        $nialidatac3persen = round($nilaidatac3 / $nialin  * 100);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);


                        $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                            ->setLabels(['Bekerja IKU 1 (%)', 'Wiraswasta IKU 1 (%)', 'Lanjut Studi IKU 1'])->setHeight(300);

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Bekerja IKU 1 (%)', [$nilaidatac1])
                            ->addData('Wiraswasta IKU 1 (%)', [$nilaidatac2])
                            ->addData('Lanjut Studi IKU 1', [$nilaidatac3])
                            ->setXAxis(['Universitas Negeri Makassar'])->setHeight(300);

                        // $dataprodi = DB::table('prodis')
                        //     ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        //     ->orderBy('urutan')
                        //     ->get();
                        $datauniv = DB::table('univs')->get();

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'datauniv', 'nilaidatac1', 'nilaidatac2', 'nilaidatac3', 'no', 'nialin', 'jreport', 'nilaijreport', 'kelompok', 'chartdua', 'presentasetotal'));
                    }
                } else if ($kelompok == 'fakultas') {
                    $datafakultas = DB::table('fakultas')
                        ->orderBy('urutan')
                        ->get();
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->join('prodis', 'prodis.kode_prodi', '=', 'questioners.kdpstmsmh')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->get()
                        ->where('tahun_lulus', $tahun);

                    // dd($bekerja);
                    $nilaiumum = count($dataumum);

                    // dd($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {
                        $bawah = $dataumum->where('f504', 1);
                        $nilaibawah = count($bawah);

                        $atas = $dataumum->where('f504', 2);
                        $nilaiatas = count($atas);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);
                        //median
                        $datamedian = $nialin;

                        $mipadatac1 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1 JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak WHERE f505 >= umph && f502 <= 6 && f8 = 1 && tahun_lulus = ' . $tahun . '&& f.kd_fak = 02';
                        $mipadatac1n = DB::select(DB::raw($mipadatac1));
                        $mipanilaidatac1 = count($mipadatac1n);

                        $mipadatac2 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1  JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak  WHERE f505 >= umph && f502 <= 6 && f8 = 3 && tahun_lulus =' . $tahun . '&& f.kd_fak = 02';
                        $mipadatac2n = DB::select(DB::raw($mipadatac2));
                        $mipanilaidatac2 = count($mipadatac2n);



                        //masih keliru query
                        $mipadatac3 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners  JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak   WHERE f8 = 4 && tahun_lulus =' . $tahun . '&& f.kd_fak = 02';
                        $mipadatac3n = DB::select(DB::raw($mipadatac3));
                        $mipanilaidatac3 = count($mipadatac3n);

                        $ftdatac1 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1 JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak WHERE f505 >= umph && f502 <= 6 && f8 = 1 && tahun_lulus = ' . $tahun . '&& f.kd_fak = 02';
                        $ftdatac1n = DB::select(DB::raw($ftdatac1));
                        $ftnilaidatac1 = count($ftdatac1n);

                        $ftdatac2 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners JOIN provinsis c ON c.id_wil = b.f5a1  JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak  WHERE f505 >= umph && f502 <= 6 && f8 = 3 && tahun_lulus =' . $tahun . '&& f.kd_fak = 02';
                        $ftdatac2n = DB::select(DB::raw($ftdatac2));
                        $ftnilaidatac2 = count($ftdatac2n);



                        //masih keliru query
                        $ftdatac3 = 'SELECT * FROM questioners a JOIN questionersatus b  ON a.id = b.id_questioners  JOIN prodis p ON a.kdpstmsmh = p.kode_prodi JOIN fakultas f ON p.kd_fak = f.kd_fak   WHERE f8 = 4 && tahun_lulus =' . $tahun . '&& f.kd_fak = 02';
                        $ftdatac3n = DB::select(DB::raw($ftdatac3));
                        $ftnilaidatac3 = count($ftdatac3n);

                        foreach ($n as $value) {
                            if ($value->f502 != '') {
                                $nilaim[] = $value->f502;
                            } else {
                                $nilaim[] = $value->f506;
                            }
                        }


                        $scoresMedian = collect($nilaim)->median();
                        // dd($nilaim);

                        //median

                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nilaibawah, $nilaiatas])
                            ->setLabels(['Mendapatkan pekerjaan <= 6 bulan', 'Mendapatkan pekerjaan > 6 bulan'])->setHeight(500)->setWidth(550);


                        // $chartdua = (new LarapexChart)->barChart()
                        //     ->addData(
                        //         'Mendapatkan pekerjaan <= 6 bulan',
                        //         [
                        //             count($bawah->where('kd_fak', '02')),
                        //             count($bawah->where('kd_fak', '03')),
                        //             count($bawah->where('kd_fak', '04')),
                        //             count($bawah->where('kd_fak', '05')),
                        //             count($bawah->where('kd_fak', '06')),
                        //             count($bawah->where('kd_fak', '07')),
                        //             count($bawah->where('kd_fak', '08')),
                        //             count($bawah->where('kd_fak', '09')),
                        //             count($bawah->where('kd_fak', '10')),
                        //             count($bawah->where('kd_fak', '01')),
                        //             count($bawah->where('kd_fak', '90'))
                        //         ]
                        //     )
                        //     ->setXAxis(['FMIPA', 'FT', 'FIK', 'FIP', 'FBS', 'FISH', 'FPSI', 'FSD', 'FE', 'PPS', '	PROFESI']);





                        foreach ($n->where('kd_fak', '02') as $value) {
                            if ($value->f502 != '') {
                                $nilaim2[] = $value->f502;
                            } else {
                                $nilaim2[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '03') as $value) {
                            if ($value->f502 != '') {
                                $nilaim3[] = $value->f502;
                            } else {
                                $nilaim3[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '04') as $value) {
                            if ($value->f502 != '') {
                                $nilaim4[] = $value->f502;
                            } else {
                                $nilaim4[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '05') as $value) {
                            if ($value->f502 != '') {
                                $nilaim5[] = $value->f502;
                            } else {
                                $nilaim5[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '06') as $value) {
                            if ($value->f502 != '') {
                                $nilaim6[] = $value->f502;
                            } else {
                                $nilaim6[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '07') as $value) {
                            if ($value->f502 != '') {
                                $nilaim7[] = $value->f502;
                            } else {
                                $nilaim7[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '08') as $value) {
                            if ($value->f502 != '') {
                                $nilaim8[] = $value->f502;
                            } else {
                                $nilaim8[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '09') as $value) {
                            if ($value->f502 != '') {
                                $nilaim9[] = $value->f502;
                            } else {
                                $nilaim9[] = $value->f506;
                            }
                        }
                        foreach ($n->where('kd_fak', '10') as $value) {
                            if ($value->f502 != '') {
                                $nilaim10[] = $value->f502;
                            } else {
                                $nilaim10[] = $value->f506;
                            }
                        }
                        $nilaim01 = array();
                        foreach ($n->where('kd_fak', '01') as $value) {
                            if ($value->f502 != '') {
                                $nilaim01[] = $value->f502;
                            } else {
                                $nilaim01[] = 1;
                            }
                        }
                        $nilaim90 = array();
                        foreach ($n->where('kd_fak', '90') as $value) {
                            if ($value->f502 != '') {
                                $nilaim90[] = $value->f502;
                            } else {
                                $nilaim90[] = $value->f506;
                            }
                        }

                        $scoresMedian2 = collect($nilaim2)->median();
                        $scoresMedian3 = collect($nilaim3)->median();
                        $scoresMedian4 = collect($nilaim4)->median();
                        $scoresMedian5 = collect($nilaim5)->median();
                        $scoresMedian6 = collect($nilaim6)->median();
                        $scoresMedian7 = collect($nilaim7)->median();
                        $scoresMedian8 = collect($nilaim8)->median();
                        $scoresMedian9 = collect($nilaim9)->median();
                        $scoresMedian10 = collect($nilaim10)->median();
                        $scoresMedian01 = collect($nilaim01)->median();
                        $scoresMedian90 = collect($nilaim90)->median();


                        $medianfak[] = $scoresMedian2;
                        $medianfak[] = $scoresMedian3;
                        $medianfak[] = $scoresMedian4;
                        $medianfak[] = $scoresMedian5;
                        $medianfak[] = $scoresMedian6;
                        $medianfak[] = $scoresMedian7;
                        $medianfak[] = intval($scoresMedian8);
                        $medianfak[] = $scoresMedian9;
                        $medianfak[] = $scoresMedian10;
                        $medianfak[] = $scoresMedian01;
                        $medianfak[] = $scoresMedian90;

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Bekerja IKU 1', [
                                $mipanilaidatac1,
                                $ftnilaidatac1,
                                count($bawah->where('kd_fak', '04')),
                                count($bawah->where('kd_fak', '05')),
                                count($bawah->where('kd_fak', '06')),
                                count($bawah->where('kd_fak', '07')),
                                count($bawah->where('kd_fak', '08')),
                                count($bawah->where('kd_fak', '09')),
                                count($bawah->where('kd_fak', '10')),
                            ])
                            ->addData('Wiraswasta IKU 1', [
                                $mipanilaidatac2,
                                $ftnilaidatac2,
                                count($atas->where('kd_fak', '04')),
                                count($atas->where('kd_fak', '05')),
                                count($atas->where('kd_fak', '06')),
                                count($atas->where('kd_fak', '07')),
                                count($atas->where('kd_fak', '08')),
                                count($atas->where('kd_fak', '09')),
                                count($atas->where('kd_fak', '10')),
                            ])
                            ->addData('Lanjut Studi IKU 1', [
                                $mipanilaidatac3,
                                $ftnilaidatac3,
                                count($atas->where('kd_fak', '04')),
                                count($atas->where('kd_fak', '05')),
                                count($atas->where('kd_fak', '06')),
                                count($atas->where('kd_fak', '07')),
                                count($atas->where('kd_fak', '08')),
                                count($atas->where('kd_fak', '09')),
                                count($atas->where('kd_fak', '10')),
                            ])
                            ->setXAxis(['FMIPA', 'FT', 'FIK', 'FIP', 'FBS', 'FISH', 'FPSI', 'FSD', 'FE',]);

                        // dd($medianfak);
                        //median2
                        $no = 1;
                        $noa = 0;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'datafakultas',  'no', 'nialin', 'jreport', 'nilaijreport', 'kelompok', 'bawah', 'atas', 'medianfak', 'noa'));
                    }
                } else if ($kelompok == 'prodi') {
                    $dataumum = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->get()
                        ->where('tahun_lulus', $tahun);

                    // dd($bekerja);
                    $nilaiumum = count($dataumum);


                    if ($nilaiumum == null) {
                        return  view('fakultas/report/vf_report_status')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                    } else {
                        $bawah = $dataumum->where('f504', 1);
                        $nilaibawah = count($bawah);

                        $atas = $dataumum->where('f504', 2);
                        $nilaiatas = count($atas);

                        $n = $dataumum->where('f504', '!=', '');
                        $nialin = count($n);
                        //median
                        $datamedian = $nialin;

                        foreach ($n as $value) {
                            if ($value->f502 != '') {
                                $nilaim[] = $value->f502;
                            } else {
                                $nilaim[] = $value->f506;
                            }
                        }


                        $scoresMedian = collect($nilaim)->median();
                        // dd($nilaim);

                        //median

                        $status = Status::all();
                        $statusarray = array();

                        foreach ($status as $key => $value) {
                            $statusarray[] = $value->nama_status;
                        }
                        // dd($statusarray);

                        $chart = (new LarapexChart)->pieChart()->setDataset([$nilaibawah, $nilaiatas])
                            ->setLabels(['Mendapatkan pekerjaan <= 6 bulan', 'Mendapatkan pekerjaan > 6 bulan'])->setHeight(500)->setWidth(550);

                        $chartdua = (new LarapexChart)->barChart()
                            ->addData('Mendapatkan pekerjaan <= 6 bulan', [$nilaibawah])
                            ->addData('Mendapatkan pekerjaan > 6 bulan', [$nilaiatas])
                            ->setXAxis([$tahun])->setHeight(300);

                        $dataprodi = DB::table('prodis')
                            ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                            ->orderBy('urutan')
                            ->get();


                        // dd($dataprodi);
                        //median2
                        $n2 = $n->where('kdpstmsmh', '87205');

                        foreach ($n2 as $value) {
                            if ($value->f502 != '') {
                                $nilaim2[] = $value->f502;
                            } else {
                                $nilaim2[] = $value->f506;
                            }
                        }


                        $scoresMedian2 = collect($nilaim2)->median();

                        // dd($scoresMedian2);

                        $no = 1;
                        return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'dataprodi',  'no', 'nialin', 'jreport', 'nilaijreport', 'kelompok', 'bawah', 'atas',));
                    }
                }
            }
        } elseif ($jreport == 'kompetensi') {
            $nilaijreport = 'Kompetensi';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_kompetensi')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->join('questionersduas', 'questionersduas.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                // dd($bekerja);
                $nilaiumum = count($dataumum);


                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_kompetensi')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {
                    $datac1 = $dataumum->where('f1761', '=>', 3);
                    $nialidatac1 = count($datac1);

                    $datac2 = $dataumum->where('f1763', '=>', 3);
                    $nialidatac2 = count($datac2);

                    $datac3 = $dataumum->where('f1765', '=>', 3);
                    $nialidatac3 = count($datac3);

                    $datac4 = $dataumum->where('f1767', '=>', 3);
                    $nialidatac4 = count($datac4);

                    $datac5 = $dataumum->where('f1769', '=>', 3);
                    $nialidatac5 = count($datac5);

                    $datac6 = $dataumum->where('f1771', '=>', 3);
                    $nialidatac6 = count($datac6);

                    $datac7 = $dataumum->where('f1773', '=>', 3);
                    $nialidatac7 = count($datac7);

                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);


                    foreach ($dataumum as $value) {
                        $nilaim1[] = $value->f1761;
                        $nilaim2[] = $value->f1763;
                        $nilaim3[] = $value->f1765;
                        $nilaim4[] = $value->f1767;
                        $nilaim5[] = $value->f1769;
                        $nilaim6[] = $value->f1771;
                        $nilaim7[] = $value->f1773;

                        $nilaim8[] = $value->f1762;
                        $nilaim9[] = $value->f1764;
                        $nilaim10[] = $value->f1766;
                        $nilaim11[] = $value->f1768;
                        $nilaim12[] = $value->f1770;
                        $nilaim13[] = $value->f1772;
                        $nilaim14[] = $value->f1774;
                    }

                    $scoresMedian1 = collect($nilaim1)->median();
                    $scoresMedian2 = collect($nilaim2)->median();
                    $scoresMedian3 = collect($nilaim3)->median();
                    $scoresMedian4 = collect($nilaim4)->median();
                    $scoresMedian5 = collect($nilaim5)->median();
                    $scoresMedian6 = collect($nilaim6)->median();
                    $scoresMedian7 = collect($nilaim7)->median();
                    $scoresMedian8 = collect($nilaim8)->median();
                    $scoresMedian9 = collect($nilaim9)->median();
                    $scoresMedian10 = collect($nilaim10)->median();
                    $scoresMedian11 = collect($nilaim11)->median();
                    $scoresMedian12 = collect($nilaim12)->median();
                    $scoresMedian13 = collect($nilaim13)->median();
                    $scoresMedian14 = collect($nilaim14)->median();



                    // $chart = (new LarapexChart)->pieChart()->setDataset([$nialidatac1persen, $nialidatac2persen, $nialidatac3persen])
                    //     ->setLabels(['Biaya Sendiri / Keluarga (%)', 'Beasiswa ADIK (%)', 'Beasiswa BIDIKMISI (%)', 'Beasiswa PPA (%)', 'Beasiswa AFIRMASI (%)', 'Beasiswa Perusahaan/Swasta (%)', 'Lainnya (%)'])->setHeight(300);

                    $chart =  (new LarapexChart)->radarChart()
                        ->addData('Pada Saat Lulus', [
                            $scoresMedian1,
                            $scoresMedian2,
                            $scoresMedian3,
                            $scoresMedian4,
                            $scoresMedian5,
                            $scoresMedian6,
                            $scoresMedian7,
                        ])
                        ->addData('Kompetensi dalam dunia kerja', [
                            $scoresMedian8,
                            $scoresMedian9,
                            $scoresMedian10,
                            $scoresMedian11,
                            $scoresMedian12,
                            $scoresMedian13,
                            $scoresMedian14,
                        ])
                        ->setXAxis(['Etika', 'Keahlian berdasarkan bidang ilmu', 'Bahasa Inggris', 'Penggunaan Teknologi Informasi', 'Komunikasi', 'Kerja sama tim', 'Pengembangan Diri'])
                        ->setMarkers(['#303F9F'], 7, 10);

                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact(
                        'chart',
                        'dataprodi',
                        'scoresMedian1',
                        'scoresMedian2',
                        'scoresMedian3',
                        'scoresMedian4',
                        'scoresMedian5',
                        'scoresMedian6',
                        'scoresMedian7',
                        'scoresMedian8',
                        'scoresMedian9',
                        'scoresMedian10',
                        'scoresMedian11',
                        'scoresMedian12',
                        'scoresMedian13',
                        'scoresMedian14',
                        'no',
                        'nialin',
                        'jreport',
                        'nilaijreport'
                    ));
                }
            }
        } elseif ($jreport == 'jumlah_responden') {
            $nilaijreport = 'Jumlah Responden';
            if ($tahun == '') {
                return  view('fakultas/report/vf_report_jumlah_responden')->with('successMsg', 'Harap Memasukkan Tahun .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->join('questionersduas', 'questionersduas.id_questioners', '=', 'questioners.id')
                    ->join('prodis', 'prodis.kode_prodi', '=', 'questioners.kdpstmsmh')
                    ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                    ->get()
                    ->where('tahun_lulus', $tahun);

                $datalulusan = DB::table('total_luluses')
                    ->get()
                    ->where('tahun_tl', $tahun)
                    ->where('kd_univ', '001036')->first();

                $datalulusanmaster = DB::table('total_luluses')
                    ->get()
                    ->where('tahun_tl', $tahun);

                // dd($datalulusan);



                $nilaiumum = count($dataumum);
                $nilailulusan = (int)$datalulusan->total_tl;

                if ($nilaiumum == null) {
                    return  view('fakultas/report/vf_report_jumlah_responden')->with('successMsg', 'Data pada Tahun ' . $tahun . ' Tidak Ditemukan');
                } else {

                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    $nialirespondenpersen = round($nilaiumum * 100 / $nilailulusan, 2);

                    $nialilulusanpersen = round($nilailulusan / $nialin  * 100);

                    $nilaisisarespondenpersen = round(100 - $nialirespondenpersen);

                    // dd($nilaiumum, $nilailulusan, $nialirespondenpersen);

                    $nialifmipa = count($dataumum->where('kd_fak', '02'));
                    $nilailulusanfmipa = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '02')->first()->total_tl;
                    $nialifmipapersen = round($nialifmipa * 100 / $nilailulusanfmipa, 2);


                    $nialift = count($dataumum->where('kd_fak', '03'));
                    $nilailulusanft = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '03')->first()->total_tl;
                    $nialiftpersen = round($nialift * 100 / $nilailulusanft, 2);


                    $nialifik = count($dataumum->where('kd_fak', '04'));
                    $nilailulusanfik = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '04')->first()->total_tl;
                    $nialifikpersen = round($nialifik * 100 / $nilailulusanfik, 2);


                    $nialifip = count($dataumum->where('kd_fak', '05'));
                    $nilailulusanfip = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '05')->first()->total_tl;
                    $nialifippersen = round($nialifip * 100 / $nilailulusanfip, 2);


                    $nialifbs = count($dataumum->where('kd_fak', '06'));
                    $nilailulusanfbs = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '06')->first()->total_tl;
                    $nialifbspersen = round($nialifbs * 100 / $nilailulusanfbs, 2);

                    $nialifish = count($dataumum->where('kd_fak', '07'));
                    $nilailulusanfish = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '07')->first()->total_tl;
                    $nialifishpersen = round($nialifish * 100 / $nilailulusanfish, 2);

                    $nialifpsi = count($dataumum->where('kd_fak', '08'));
                    $nilailulusanfpsi = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '08')->first()->total_tl;
                    $nialifpsipersen = round($nialifpsi * 100 / $nilailulusanfpsi, 2);

                    $nialifsd = count($dataumum->where('kd_fak', '09'));
                    $nilailulusanfsd = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '09')->first()->total_tl;
                    $nialifsdpersen = round($nialifsd * 100 / $nilailulusanfsd, 2);


                    $nialife = count($dataumum->where('kd_fak', '10'));
                    $nilailulusanfe = DB::table('total_luluses')->get()->where('tahun_tl', $tahun)
                        ->where('kd_fak', '10')->first()->total_tl;
                    $nialifepersen = round($nialife * 100 / $nilailulusanfe, 2);


                    $chart = (new LarapexChart)->pieChart()->setDataset([$nialirespondenpersen, $nilaisisarespondenpersen])
                        ->setLabels(['Mengisi Kuesioner (%)', 'Belum Mengisi Kuesioner (%)'])->setHeight(500)->setWidth(550);


                    $chartdua = (new LarapexChart)->horizontalBarChart()
                        ->setTitle('Persentase Jumlah Telah Mengisi')
                        ->setSubtitle('Fakultas')
                        ->setColors(['#FFC107'])
                        ->addData('Presentase Telah Mengisi', [
                            $nialifmipapersen,
                            $nialiftpersen,
                            $nialifikpersen,
                            $nialifippersen,
                            $nialifbspersen,
                            $nialifishpersen,
                            $nialifpsipersen,
                            $nialifsdpersen,
                            $nialifepersen,
                        ])->setXAxis([
                            'FMIPA',
                            'FT',
                            'FIK',
                            'FIP',
                            'FBS',
                            'FIS-H',
                            'FPsi',
                            'FSD',
                            'FE'
                        ])->setHeight(300);


                    $dataprodi = DB::table('prodis')
                        ->join('fakultas', 'fakultas.kd_fak', '=', 'prodis.kd_fak')
                        ->orderBy('urutan')
                        ->get();

                    $no = 1;
                    return view('fakultas/report/vf_report_status_hasil', compact('chart', 'chartdua', 'no', 'nialin', 'jreport', 'dataprodi', 'nilaijreport', 'dataumum', 'datalulusanmaster'));
                }
            }
        } else {
            echo "koko";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hitungmedian($kd_prodi, $dataumum)
    {
        $n = $dataumum->where('f504', '!=', '');
        $nialin = count($n);

        $datamedian = $nialin;

        foreach ($n as $value) {
            if ($value->f502 != '') {
                $nilaim[] = $value->f502;
            } else {
                $nilaim[] = $value->f506;
            }
        }


        $scoresMedian = collect($nilaim)->median();
    }
}
