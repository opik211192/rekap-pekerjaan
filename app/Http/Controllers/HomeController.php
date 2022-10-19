<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPaket = Paket::count();
        $dataBangunan = Bangunan::count();

        //dd($dataBangunan);
        return view('home', compact('dataPaket', 'dataBangunan'));
    }
}
