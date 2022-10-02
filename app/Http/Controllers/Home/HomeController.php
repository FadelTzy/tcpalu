<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // return view('home');


        return view('tcpalu');
    }
    public function kuesioner()
    {
        return view('kuesioner');
    }
    public function survei()
    {
        $data= Prodi::get();
        return view('survei2',compact('data'));
    }
    
}
