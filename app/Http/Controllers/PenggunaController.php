<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Http;

class PenggunaController extends Controller
{
        public function index(){
//     $hasil = user::all();
     $response = Http::get('http://localhost:8000/api/users/');
//
//     return $response;
     return view('dashboard/pengguna',compact('response'));
}
}
