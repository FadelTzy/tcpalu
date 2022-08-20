<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use App\Models\Prodi;
use App\Models\Tahun_lulus;
use App\Models\total_lulus;
use App\Models\univ;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CTotal_lulus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_lulus = Tahun_lulus::all();
        $univ = univ::all();
        $fakultas = fakultas::all();
        $prodi = Prodi::all();
        if (request()->ajax()) {
            return Datatables::of(total_lulus::all())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                </li>

                </ul>";
                return $btn;
            })->addColumn('nm_univ', function ($data) {
                $btn = $data->univ->nm_univ ?? "None";
                return $btn;
            })->addColumn('nama_fak', function ($data) {
                $btn = $data->fakultas->nama_fak ?? "None";
                return $btn;
            })->addColumn('nama_prodi', function ($data) {
                $btn = $data->prodi->nama_prodi ?? "None";
                return $btn;
            })
                ->rawColumns(['aksi'])->make(true);
        }
        return view('admin/va_totallulus', compact('tahun_lulus', 'univ', 'fakultas', 'prodi'));
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
        total_lulus::create([
            "kd_univ" => $request->kd_univ,
            "kd_fak" => $request->kd_fak,
            "kode_prodi" => $request->kode_prodi,
            "tahun_tl" => $request->tahun_tl,
            "total_tl" => $request->total_tl,
        ]);
        $return = array(
            'status'    => true,
            'message'    => 'Data berhasil disimpan..',
        );
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
        $res = total_lulus::findOrFail($id);
        if ($res == null) {
            return false;
        }
        $res->delete();
        return true;
    }
}
