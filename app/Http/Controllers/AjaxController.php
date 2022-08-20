<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax-request');
    }

    public function create()
    {
        return view('ajax-request');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here
        // print_r($data);
        // die();
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->message,
        ]);
        $return = array(
            'status'    => true,
            'message'    => 'Data berhasil disimpan..',
        );


        return response()->json(['success' => $return]);
    }
}
