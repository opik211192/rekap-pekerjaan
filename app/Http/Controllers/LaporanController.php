<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bangunan;

class LaporanController extends Controller
{
    public function index()
    {
        $pakets = Paket::with('bangunans')->get();
        // dd($pakets);
        return view('laporan.index', compact('pakets'));

    }

    public function cetak(Request $request)
    {
        //dd($request->filter_paket);
        $paket = Paket::with('bangunans')->where('id','=', $request->filter_paket)->first();
        $bangunans = Bangunan::with('paket', 'province', 'city', 'district', 'village')->where('paket_id','=', $request->filter_paket)->get();
        $pdf = PDF::loadview('laporan.cetak', compact('paket', 'bangunans'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->stream($paket->name.".pdf");
        //dd($bangunans);
        // foreach ($bangunans as $key => $b) {
        //     echo $b->name." ".ucwords(strtolower($b->province->name))." ".ucwords(strtolower($b->city->name))."<br>";
        // }
    }
}
