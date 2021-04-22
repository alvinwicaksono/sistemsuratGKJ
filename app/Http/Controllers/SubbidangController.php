<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subbidang;
use Illuminate\Support\Facades\Http;

class SubbidangController extends Controller
{
     public function index(){
     $hasil = subbidang::all();
     $bidang =  Http::get('http://localhost:8000/api/bidang/');

     return view('dashboard/subbidang',['liat'=>$hasil,'bidang'=>$bidang]);
    }

    public function store(Request $request){
         return $request;
    }
}
