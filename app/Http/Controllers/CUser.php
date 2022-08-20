<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;



// use Yajra\Datatables\Facades\Datatables;


class CUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $koko = auth::user()->role;
        // dd($koko);
        if (request()->ajax()) {
            $query = User::all();
            $i = 0;
            foreach ($query as $item) {
                if ($item->role == 1) {
                    $query[$i]->role = 'Admin';
                } else {
                    $query[$i]->role = 'Mahasiswa';
                }
                $i++;
            }
            return Datatables::of($query)->addIndexColumn()->addColumn('aksi', function ($data) {
                // dd($data);

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
        return view('admin/va_user');
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
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => $request->role,
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
        $request = User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
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
        $res = User::findOrFail($id);
        if ($res == null) {
            return false;
        }
        $res->delete();
        return true;
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
