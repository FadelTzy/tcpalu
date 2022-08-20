<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CStatus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Status::all())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'> <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-success btn-xs mb-1'>Edit</button> </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                </li>

                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }


        return view('admin/va_status');
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
        Status::create([
            "nama_status" => $request->nama_status,
            "deskripsi_status" => $request->deskripsi_status,
            "nilai_status" => $request->nilai_status,
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
        $request = Status::where('id', $request->id)
            ->update([
                'nama_status' => $request->nama_status,
                'deskripsi_status' => $request->deskripsi_status,
                'nilai_status' => $request->nilai_status,
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
        $res = Status::findOrFail($id);
        if ($res == null) {
            return false;
        }
        $res->delete();
        return true;
    }
}
