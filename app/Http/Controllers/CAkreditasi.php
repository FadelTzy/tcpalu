<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\questioner;
use App\Models\Tahun_lulus;
use App\Models\total_lulus;
use Illuminate\Support\Facades\DB;

class CAkreditasi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_emba', compact('prodi'));
    }

    public function banpt()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_banpt', compact('prodi'));
    }

    public function lamdik()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_lamdik', compact('prodi'));
    }

    public function laminfokom()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_laminfokom', compact('prodi'));
    }

    public function lamteknik()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_lamteknik', compact('prodi'));
    }

    public function lamsama()
    {
        $prodi = Prodi::all();
        return  view('admin/akreditasi/va_akreditasi_lamsama', compact('prodi'));
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

    public function hasilemba(Request $request)
    {
        $jakreditasi = $request->jakreditasi;
        // $kd_univ = $request->kd_univ;
        // $kelompok = $request->kelompok;

        if (request()->ajax()) {
            return Datatables::of(questioner::with('prodi')->get())->addIndexColumn()->addColumn('nama_prodi', function ($data) {
                $btn = $data->prodi->nama_prodi ?? "None";
                return $btn;
            })->make(true);
        }
        if ($jakreditasi == 'emba') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'LAM EMBA';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);



                    $sesuai = $dataumum->where('f14', '<=', 3);
                    $tidaksesuai = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);
                    $ttkmultinasional = $dataumum->where('f5d', '==', 3);



                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'sesuai', 'tidaksesuai', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas'));
                }
            }
        } elseif ($jakreditasi == 'banpt') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'BAN PT';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);

                    $rendah = $dataumum->where('f14', '<=', 2);
                    $sedang = $dataumum->where('f14', '==', 3);
                    $tinggi = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);
                    $ttkmultinasional = $dataumum->where('f5d', '==', 3);



                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'rendah', 'sedang', 'tinggi', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas'));
                }
            }
        }
        if ($jakreditasi == 'lamdik') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'LAMDIK';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);





                    $rendah = $dataumum->where('f14', '<=', 2);
                    $sedang = $dataumum->where('f14', '==', 3);
                    $tinggi = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);
                    $ttkmultinasional = $dataumum->where('f5d', '==', 3);



                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'rendah', 'sedang', 'tinggi', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas'));
                }
            }
        }
        if ($jakreditasi == 'laminfokom') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'LAM INFOKOM';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_emba')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);

                    $nilapembagi = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->where('f8', 1)
                        ->orWhere('f8', 3)
                        ->get()->count();
                    $nilaif502 = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->select('questionersatus.f502')
                        ->sum('questionersatus.f502');
                    $nilaif506 = DB::table('questioners')
                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                        ->select('questionersatus.f506')
                        ->sum('questionersatus.f506');
                    // $nilaif502 = $nilai->f502;
                    // $nilaif506 = $nilai;
                    // dd($nilapembagi);


                    $rendah = $dataumum->where('f14', '<=', 2);
                    $sedang = $dataumum->where('f14', '==', 3);
                    $tinggi = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);

                    $ttkmultinasional = $dataumum->where('f8', '==', 1)->where('f5d', '==', 3);

                    $ttkwirausaha = $dataumum->where('f5d', '==', 2);




                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'rendah', 'sedang', 'tinggi', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas', 'prodi', 'ttkwirausaha'));
                }
            }
        } elseif ($jakreditasi == 'lamteknik') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'LAM TEKINIK';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_lamteknik')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_lamteknik')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);

                    $rendah = $dataumum->where('f14', '<=', 2);
                    $sedang = $dataumum->where('f14', '==', 3);
                    $tinggi = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);
                    $ttkmultinasional = $dataumum->where('f5d', '==', 3);



                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'rendah', 'sedang', 'tinggi', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas'));
                }
            }
        } elseif ($jakreditasi == 'lamsama') {
            $prodi = $request->kode_prodi;

            $nama_prodi = Prodi::where('kode_prodi', $prodi)->get()->first();
            $tingkatprodi = $nama_prodi->tingkat_prodi;
            if ($tingkatprodi == 'S1' || $tingkatprodi == 'S2' || $tingkatprodi == 'S3') {
                $jtp = 'sarjana';
            } else {
                $jtp = 'diploma';
            }

            $nilaijakreditasi = 'LAM SAMA';
            if ($prodi == '') {
                return  view('admin/akreditasi/va_akreditasi_lamteknik')->with('successMsg', 'Harap Memilih Prodi .');
            } else {
                $dataumum = DB::table('questioners')
                    ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                    ->get()
                    ->where('kdpstmsmh', $prodi)
                    ->where('f504', '!=', null);

                // dd($bekerja);
                $nilaiumum = count($dataumum);
                $tahunlulus = Tahun_lulus::all();
                $totallulus = total_lulus::where('kode_prodi', $prodi)->get();


                if ($nilaiumum == null) {
                    return  view('admin/akreditasi/va_akreditasi_lamteknik')->with('successMsg', 'Data pada Prodi ' . $prodi . ' Tidak Ditemukan');
                } else {
                    //sarjana
                    $dibawah = $dataumum->where('f506', '<', 6);
                    $diantara = $dataumum->where('f506', '>=', 6)->where('f506', '<=', 18);
                    $diatas = $dataumum->where('f506', '>', 18);

                    //diploma
                    $ddibawah = $dataumum->where('f506', '<', 3);
                    $ddiantara = $dataumum->where('f506', '>=', 3)->where('f506', '<=', 6);
                    $ddiatas = $dataumum->where('f506', '>', 6);

                    $rendah = $dataumum->where('f14', '<=', 2);
                    $sedang = $dataumum->where('f14', '==', 3);
                    $tinggi = $dataumum->where('f14', '=>', 4);

                    $ttklokal = $dataumum->where('f5d', '==', 1);
                    $ttknasional = $dataumum->where('f5d', '==', 2);
                    $ttkmultinasional = $dataumum->where('f5d', '==', 3);

                    $lanjutstudi = $dataumum->where('f8', '==', 4);



                    $n = $dataumum->where('f8', '!=', '');
                    $nialin = count($n);

                    // $nilai_total = $nialibekerja + $nialiwiraswasta;
                    // $nilai_total1 = $nialiwiraswasta / $nialin  * 100;

                    // $nialibekerjapersen = round($nialibekerja / $nialin  * 100);
                    // $nialiwiraswastapersen = round($nialiwiraswasta / $nialin  * 100);
                    // $nialilanjutpersen = round($nialilanjut / $nialin  * 100);
                    // $nialitdkkerjapersen = round($nialitdkkerja / $nialin  * 100);
                    // $nialiblmkerjapersen = round($nialiblmkerja / $nialin  * 100);





                    // dd($statusarray);


                    $no = 1;
                    $nod = 1;
                    $not = 1;
                    return view('admin/akreditasi/va_akreditasi_hasil', compact('no', 'dataumum', 'nialin', 'nama_prodi', 'jakreditasi', 'nilaijakreditasi', 'dibawah', 'tahunlulus', 'totallulus', 'diantara', 'diatas', 'nod', 'rendah', 'sedang', 'tinggi', 'not', 'ttklokal', 'ttknasional', 'ttkmultinasional', 'jtp', 'ddibawah', 'ddiantara', 'ddiatas', 'lanjutstudi'));
                }
            }
        } else {
            echo "koko";
        }
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
}
