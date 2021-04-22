<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SekumController extends Controller
{
    public function list()
    {
        $waiting = count(Http::get('http://localhost:8000/api/status/Menunggu Desposisi')['data']);
        if($waiting==0)
        {
            return redirect('sm-sekum');
        }else {
            $hasil = Http::get('http://localhost:8000/api/status/Menunggu Desposisi');
            $penerima = Http::get('http://localhost:8000/api/penerima')['data'];
            return view('sekum/suratmasuksekum', compact('hasil', 'penerima'));
        }
    }

    public function home()
    {
        $waiting = count(Http::get('http://localhost:8000/api/status/Menunggu Desposisi')['data']);
        $selesai = count(Http::get('http://localhost:8000/api/desposisi')['data']);
        return view('sekum/suratmasuk',compact('waiting','selesai'));
    }

    public function selesai(){
        $selesai = count(Http::get('http://localhost:8000/api/status/Selesai')['data']);
        if($selesai==0)
        {
            return redirect('sm-sekum');
        }else {
            $hasil = Http::get('http://localhost:8000/api/desposisi')->json();
            return view('sekum/selesai', compact('hasil'));
        }
    }

}
