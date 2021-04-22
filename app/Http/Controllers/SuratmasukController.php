<?php

namespace App\Http\Controllers;

use App\Bidang;
use Illuminate\Http\Request;
use App\Suratmasuk;
use Illuminate\Support\Facades\Http;

class SuratmasukController extends Controller
{
    public function index(){

    $teregistrasi = count(Http::get('http://localhost:8000/api/status/Teregistrasi')['data']);
    $waiting = count(Http::get('http://localhost:8000/api/status/Menunggu Desposisi')['data']);
    $terdesposisi = count(Http::get('http://localhost:8000/api/desposisi/Terdesposisi')['data']);
    $arsipwait = count(Http::get('http://localhost:8000/api/desposisi/Menunggu Arsip')['data']);
    $diarsipkan = count(Http::get('http://localhost:8000/api/status/Diarsipkan')['data']);
    $selesai = count(Http::get('http://localhost:8000/api/status/Selesai')['data']);


    return view('dashboard/surat masuk/suratmasuk',compact('teregistrasi','terdesposisi','waiting','arsipwait','diarsipkan','selesai'));
    }

    public function teregistrasi(){
        $teregistrasi = count(Http::get('http://localhost:8000/api/status/Teregistrasi')['data']);
        if($teregistrasi==0)
        {
            return redirect('suratmasuk');
        }else {
            $hasil = Http::get('http://localhost:8000/api/status/Teregistrasi')['data'];
            $total = count($hasil);
//        return $total;
            return view('dashboard/surat masuk/teregistrasi', compact('hasil'));
        }
    }

    public function waiting(){
        $waiting = count(Http::get('http://localhost:8000/api/status/Menunggu Desposisi')['data']);
        if($waiting==0){
            return redirect('suratmasuk');
        }else {
            $hasil = Http::get('http://localhost:8000/api/status/Menunggu Desposisi')['data'];
            return view('dashboard/surat masuk/waiting', compact('hasil'));
        }
    }

    public function terdesposisi(){
        $terdesposisi = count(Http::get('http://localhost:8000/api/desposisi/Terdesposisi')['data']);
        if($terdesposisi==0){
            return redirect('suratmasuk');
        }else {
            $hasil = Http::get('http://localhost:8000/api/desposisi/Terdesposisi')->json();
            return view('dashboard/surat masuk/terdesposisi', compact('hasil'));
        }
    }

    public function arsipWait(){

        $arsipwait = count(Http::get('http://localhost:8000/api/desposisi/Menunggu Arsip')['data']);
        if($arsipwait==0)
        {
            return redirect('suratmasuk');
        }else {
            $hasil = Http::get('http://localhost:8000/api/desposisi/Menunggu Arsip')->json();
            $box = Http::get('http://localhost:8000/api/box');
            $lembaga = Http::get('http://localhost:8000/api/lembaga')['data'];
            $tsubbidang = Http::get('http://localhost:8000/api/Tsubbidang');
            $formats = Http::get('http://localhost:8000/api/format');
//    return $tsub;
            return view('dashboard/surat masuk/menungguArsip', compact( 'box', 'lembaga', 'tsubbidang', 'formats', 'hasil'));
        }
    }

    public function diarsipkan(){
        $diarsipkan = count(Http::get('http://localhost:8000/api/status/Diarsipkan')['data']);
        if($diarsipkan==0)
        {
            return redirect('suratmasuk');
        }else{
            $hasil = Http::get('http://localhost:8000/api/desposisi/Diarsipkan')->json();
            return view('dashboard/surat masuk/diarsipkan',compact('hasil'));
        }

    }

    public function selesai(){
        $selesai = count(Http::get('http://localhost:8000/api/status/Selesai')['data']);
        if($selesai==0)
        {
            return redirect('suratmasuk');
        }else {
            $hasil = Http::get('http://localhost:8000/api/desposisi/Selesai')->json();
            return view('dashboard/surat masuk/selesai', compact('hasil'));
        }
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

    public function aktifitas($id)
    {
        $hasil = Http::get('http://localhost:8000/api/tracking/'.$id)['data'];
        return view('dashboard/surat masuk/aktifitas',compact('hasil'));
    }

}
