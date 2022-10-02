<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\SurveiPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Prodi::get();
        return view('survei2',compact('data'));
    }
    public function report(Request $request)
    {
        return view('admin.report.va_report_survei');
        
    }
    public function HasilReport(Request $request)
    {
        // $d = SurveiPengguna::where('tahun_lulus', $request->tahun)->get();
        $d = DB::table('survei_penggunas')->selectRaw("AVG(item1) as item1,AVG(item2) as item2, AVG(item3) as item3, AVG(item4) as item4, AVG(item5) as item5, AVG(item6) as item6, AVG(item7) as item7, AVG(item8) as item8, AVG(item9) as item9, AVG(item11) as item11, AVG(item12) as item12, AVG(item13) as item13, AVG(item14) as item14, AVG(item15) as item15, AVG(item16) as item16, AVG(item17) as item17, AVG(item18) as item18, AVG(item19) as item19, count(item1) as jml")->where('tahun_lulus', $request->tahun)->first();
        if ($d){
            $data1 = [
                $d->item1,
                $d->item2,
                $d->item3,
                $d->item4,
                $d->item5,
                $d->item6,
                $d->item7,
                $d->item8,
                $d->item9,
            ];
            $data2 = [
                $d->item11,
                $d->item12,
                $d->item13,
                $d->item14,
                $d->item15,
                $d->item16,
                $d->item17,
                $d->item18,
                $d->item19,
            ];
           

            $labels = ['Sikap/Etika','Keahlian pada bidang ilmu','Kemampuan berbahasa asing','Penggunaan teknologi informasi','Kemampuan berkomunikasi','Kemampuan Kerjasama','Kemampuan Pengembangan Diri','Kepemimpinan','Etos Kerja'];
            $return = array(
                'data1' => $data1 ,
                'data2' => $data2 ,
                'labels' => $labels ,
                'label' => ['Penguasaan Kompetensi Alumni', 'Skor Ideal Kompetensi'] ,
                'n' => $d->jml,
                'status' => true,
                'message' => ''
            );
        } else {
            $return = array(
                'status' => false,
                'message' => 'Data pada Tahun '.$request->tahun.' Tidak Ditemukan'
            );
        }
        return response()->json($return);
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
        $request->validate([
            'pengisi' => 'required',
            'perusahaan' => 'required',
            'jabatan' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'lulusan' => 'required',
            'tahunLulus' => 'required',
            'programStudi' => 'required',

            'radio1' => 'required',
            'radio2' => 'required',
            'radio3' => 'required',
            'radio4' => 'required',
            'radio5' => 'required',
            'radio6' => 'required',
            'radio7' => 'required',
            'radio8' => 'required',
            'radio9' => 'required',

            'radio11' => 'required',
            'radio12' => 'required',
            'radio13' => 'required',
            'radio14' => 'required',
            'radio15' => 'required',
            'radio16' => 'required',
            'radio17' => 'required',
            'radio18' => 'required',
            'radio19' => 'required',

            // 'harapan' => 'required',
            // 'saran' => 'required',
            
        ]);
        $dataO = array(
            'pengisi' => $request->pengisi ,
            'perusahaan' => $request->perusahaan ,
            'jabatan' => $request->jabatan ,
            'hp' => $request->phone ,
            'email' => $request->email ,
            'lulusan' => $request-> lulusan,
            'tahun_lulus' => $request->tahunLulus ,
            'prodi' => $request->programStudi ,
            'item1' => $request->radio1 ,
            'item2' => $request->radio2 ,
            'item3' => $request->radio3 ,
            'item4' => $request->radio4 ,
            'item5' => $request->radio5 ,
            'item6' => $request->radio6 ,
            'item7' => $request->radio7 ,
            'item8' => $request->radio8 ,
            'item9' => $request->radio9 ,
            'item11' => $request->radio11 ,
            'item12' => $request->radio12 ,
            'item13' => $request->radio13 ,
            'item14' => $request->radio14 ,
            'item15' => $request->radio15 ,
            'item16' => $request->radio16 ,
            'item17' => $request->radio17 ,
            'item18' => $request->radio18 ,
            'item19' => $request->radio19 ,
            'harapan' => $request->harapan ,
            'saran' => $request->saran ,

        );
        $d = SurveiPengguna::create($dataO);
        if ($d){
            $return = array(
                'status' => true,
                'message' => 'Survei berhasil disimpan..'
            );
        } else {
            $return = array(
                'status' => false,
                'message' => 'Gagal disimpan..'
            );
        }
        return response()->json($return);
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
