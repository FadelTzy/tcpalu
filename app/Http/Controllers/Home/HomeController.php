<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
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
    // public function survei()
    // {
    //     return view('survei');
    // }
}
