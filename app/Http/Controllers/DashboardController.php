<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $sm = Http::get('http://localhost:8000/api/sm')['data'];
        $sts = Http::get('http://localhost:8000/api/sts')['data'];


        return view('dashboard/dashboard',compact('sm','sts'));
    }
    public function suratmasuk()
    {
     	return view('dashboard/suratmasuk');
    }
}
