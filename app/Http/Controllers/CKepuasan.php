<?php

namespace App\Http\Controllers;

use App\Exports\KepuasanExport;
use App\Models\kuesioner_p;
use Illuminate\Http\Request;
use App\Models\Tahun_lulus;
use App\Models\univ;
use App\Models\Prodi;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\questioner;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

class CKepuasan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatahun = Tahun_lulus::all();
        $datauniv = univ::all();
        $dataprodi = Prodi::all();
        // if (request()->ajax()) {
        //     return Datatables::of(questioner::orderBy('tahun_lulus', 'desc')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
        //         $dataj = json_encode($data);

        //         $btn = "<ul class='list-inline mb-0'>
        //         <li class='list-inline-item'>
        //         <button type='button' data-toggle='modal' onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
        //         </li>

        //         </ul>";
        //         return $btn;
        //     })->rawColumns(['aksi'])->make(true);
        // }
        $query = DB::table('kuesioner_ps')
            ->join('users', 'users.id', '=', 'kuesioner_ps.id_user')
            ->join('questioners', 'questioners.nimhsmsmh', '=', 'users.email')
            ->where('kp1', '!=', null)
            ->get();
        // dd($query);
        if (request()->ajax()) {
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn = "<ul class='list-inline mb-0'>
            <li class='list-inline-item'>
            <button type='button' data-toggle='modal' onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
            </li>

            </ul>";
                    return $btn;
                })
                // ->addColumn('nama', function ($data) {
                //     $dataj = json_encode($data);

                //     $btn = $data->user->name;
                //     return $btn;
                // })
                // ->addColumn('tahun_lulus', function ($data) {
                //     $dataj = json_encode($data);

                //     $btn = $data->user->mahasiswa->tahun_lulus;
                //     return $btn;
                // })
                ->rawColumns(['aksi', 'nama'])->toJson();
        }
        return view('admin/va_kepuasan', compact('datatahun', 'datauniv', 'dataprodi'));
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

    public function export(Request $request)
    {
        $query = DB::table('kuesioner_ps')
            ->join('users', 'users.id', '=', 'kuesioner_ps.id_user')
            ->join('questioners', 'questioners.nimhsmsmh', '=', 'users.email')
            ->where('kp1', '!=', null)
            ->get();
        // dd($query);
        $tahun = $request->tahun_lulus;
        $univ = $request->univ;
        $prodi = $request->prodi;
        // $tahun = $request->tahun_lulus;
        return Excel::download(new KepuasanExport($tahun, $univ, $prodi), 'kepuasan.xlsx');
    }
}
