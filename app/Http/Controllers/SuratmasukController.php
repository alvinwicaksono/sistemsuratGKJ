<?php

namespace App\Http\Controllers;

use App\Bidang;
use Illuminate\Http\Request;
use App\Suratmasuk;
use Illuminate\Support\Facades\Http;

class SuratmasukController extends Controller
{
    public function index(){
    $hasil = suratmasuk::all();
    return view('dashboard/suratmasuk',['liat'=>$hasil]);
    }

    public function create(){
        $bidang =  Http::get('http://localhost:8000/api/bidang/');
        $subBidang =  Http::get('http://localhost:8000/api/subbidang/');
//        return $bidang;
        return view('dashboard/tsuratmasuk',compact('bidang','subBidang'));
    }

    public function subCat(Request $request)
    {

        $parent_id = $request->bidang;

        $subcategories = Bidang::where('id',$parent_id)
            ->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

}
