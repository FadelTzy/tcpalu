<?php

namespace App\Http\Controllers;

use App\Models\Tahun_lulus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CTahun_lulus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Tahun_lulus::all())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updateaktif(" . $data->id . ")'   class='btn btn-success btn-sm mb-1'>Aktifkan</button>
                <button type='button' data-toggle='modal' onclick='updatenonaktif(" . $data->id . ")'   class='btn btn-danger btn-sm mb-1'>Non-Aktifkan</button>
                <button type='button' data-toggle='modal' onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm mb-1'>Hapus</button>
                </li>

                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }
        return view('admin/va_tl');
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
        Tahun_lulus::create([
            "nilai_tl" => $request->nilai_tl,
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
    public function update(Request $request)
    {
        $request = Tahun_lulus::where('id', $request->id)
            ->update([
                'status_tl' => $request->status_tl,
            ]);
        // return redirect()->back();
        $return = array(
            'status'    => true,
            'message'    => 'Data berhasil diupdate..',
        );
        return response()->json($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Tahun_lulus::findOrFail($id);
        if ($res == null) {
            return false;
        }
        $res->delete();
        return true;
    }
}
