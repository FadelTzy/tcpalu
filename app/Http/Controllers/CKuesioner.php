<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Hubungan;
use App\Models\jabatan;
use App\Models\Jenis_tk;
use App\Models\Kota;
use App\Models\kuesioner_p;
use App\Models\Prodi;
use App\Models\Provinsi;
use App\Models\questioner;
use App\Models\questionersatu;
use App\Models\questionersdua;
use App\Models\questionersempat;
use App\Models\questionerstiga;
use App\Models\Status;
use App\Models\Sumber_biaya;
use App\Models\Sumber_dana;
use App\Models\Tahun_lulus;
use App\Models\Tingkat_pendidikan;
use App\Models\Tingkat_tk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class CKuesioner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = auth::user()->email;
        $check = DB::table('questioners')->where('nimhsmsmh', $id_user)->get();
        $ncheck = count($check);
        $tahun_lulus = Tahun_lulus::all();
        $prodi = Prodi::all();
        $status = Status::all();
        $provinsi = Provinsi::with('kota')->get()->toArray();
        $kota = Kota::all();
        $jenis_tk = Jenis_tk::all();
        $jabatan = jabatan::all();
        $tingkat_tk = Tingkat_tk::all();
        $tingkat_tk = Tingkat_tk::all();
        $sumber_biaya = Sumber_biaya::all();
        $hubungan = Hubungan::all();
        $tingkat_pendidikan = Tingkat_pendidikan::all();
        $sumber_dana = Sumber_dana::all();
        // if ($ncheck != null) {
        //     return redirect('mahasiswa/dashboard')->withErrors("Anda Telah Mengsi Kuesioner");
        // } else {
        return view('mahasiswa/vm_kuesioner', compact('tahun_lulus', 'prodi', 'status', 'provinsi', 'kota', 'jenis_tk', 'jabatan', 'tingkat_tk', 'sumber_biaya', 'hubungan', 'tingkat_pendidikan', 'sumber_dana'));
        // }
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
        // dd($request);

        $vquestioner = questioner::create([
            "id_user" => auth::user()->id,
            "kdpstmsmh" => $request->kdpstmsmh,
            "nimhsmsmh" => $request->nimhsmsmh,
            "nmmhsmsmh" => $request->nmmhsmsmh,
            "telpomsmh" => $request->telpomsmh,
            "emailmsmh" => $request->emailmsmh,
            "tahun_lulus" => $request->tahun_lulus,
            "nik" => $request->nik,
            "npwp" => $request->npwp,
        ]);

        questionersatu::create([
            "id_questioners" => $vquestioner->id,
            "f8" => $request->f8,
            "f504" => $request->f504,
            "f502" => $request->f502,
            "f505" => $request->f505,
            "f506" => $request->f506,
            "f5a1" => $request->f5a1,
            "f5a2" => $request->f5a2,
            "f1101" => $request->f1101,
            "f1102" => $request->f1102,
            "f5b" => $request->f5b,
            "f5c" => $request->f5c,
            "f5d" => $request->f5d,
            "f18a" => $request->f18a,
            "f18b" => $request->f18b,
            "f18c" => $request->f18c,
            "f18d" => $request->f18d,
            "f1201" => $request->f1201,
            "f1202" => $request->f1202,
            "f14" => $request->f14,
            "f15" => $request->f15,
        ]);

        questionersdua::create([
            "id_questioners" => $vquestioner->id,
            "f1761" => $request->f1761,
            "f1762" => $request->f1762,
            "f1763" => $request->f1763,
            "f1764" => $request->f1764,
            "f1765" => $request->f1765,
            "f1766" => $request->f1766,
            "f1767" => $request->f1767,
            "f1768" => $request->f1768,
            "f1769" => $request->f1769,
            "f1770" => $request->f1770,
            "f1771" => $request->f1771,
            "f1772" => $request->f1772,
            "f1773" => $request->f1773,
            "f1774" => $request->f1774,
        ]);
        questionerstiga::create([
            "id_questioners" => $vquestioner->id,
            "f21" => $request->f21,
            "f22" => $request->f22,
            "f23" => $request->f23,
            "f24" => $request->f24,
            "f25" => $request->f25,
            "f26" => $request->f26,
            "f27" => $request->f27,
            "f301" => $request->f301,
            "f302" => $request->f302,
            "f303" => $request->f303,
            "f401" => $request->f401,
            "f1402" => $request->f1402,
            "f403" => $request->f403,
            "f404" => $request->f404,
            "f405" => $request->f405,
            "f406" => $request->f406,
            "f407" => $request->f407,
            "f408" => $request->f408,
            "f409" => $request->f409,
            "f410" => $request->f410,
            "f411" => $request->f411,
            "f412" => $request->f412,
            "f413" => $request->f413,
            "f414" => $request->f414,
            "f415" => $request->f415,
            "f416" => $request->f416,
        ]);
        questionersempat::create([
            "id_questioners" => $vquestioner->id,
            "f6" => $request->f6,
            "f7" => $request->f7,
            "f7a" => $request->f7a,
            "f1001" => $request->f1001,
            "f1002" => $request->f1002,
            "f1601" => $request->f1601,
            "f1602" => $request->f1602,
            "f1603" => $request->f1603,
            "f1604" => $request->f1604,
            "f1605" => $request->f1605,
            "f1606" => $request->f1606,
            "f1607" => $request->f1607,
            "f1608" => $request->f1608,
            "f1609" => $request->f1609,
            "f1610" => $request->f1610,
            "f1611" => $request->f1611,
            "f1612" => $request->f1612,
            "f1613" => $request->f1613,
            "f1614" => $request->f1614,
        ]);

        $return = array(
            'status'    => true,
            'message'    => 'Data berhasil disimpan..',
        );
        // return response()->json($return);
        // return view('mahasiswa/vm_home');
        return Redirect::to('mahasiswa')->withErrors("Anda Berhasil Mengsi Kuesioner");
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

    public function kuesionerp(Request $request)
    {
        // dd('koko');
        kuesioner_p::create([
            "id_user" => auth::user()->id,
            "kp1" => $request->kp1,
            "kp2" => $request->kp2,
            "kp3" => $request->kp3,
            "kp4" => $request->kp4,
            "kp5" => $request->kp5,
            "kp6" => $request->kp6,
            "kp7" => $request->kp7,
            "kp8" => $request->kp8,
            "kp9" => $request->kp9,
            "kp10" => $request->kp10,
            "kp11" => $request->kp11,
            "kp12" => $request->kp12,
            "kp13" => $request->kp13,
            "kp14" => $request->kp14,
        ]);
        return redirect::to('mahasiswa/dashboard')->withErrors("Anda Berhasil Mengsi Kuesioner");
    }
}
