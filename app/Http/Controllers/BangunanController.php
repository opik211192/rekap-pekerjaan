<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Paket;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use yajra\Datatables\Datatables;


class BangunanController extends Controller
{
    public function index(Request $request)
    {
        $pakets = Paket::all();
        if($request->ajax()){
            if (!empty($request->filter_paket)) {
                $bangunan = Bangunan::query()->with('paket')
                ->where('paket_id', $request->filter_paket)
                ->get();
                
            }else{
                $bangunan = Bangunan::query()->with('paket')
                ->get();
                
            }

            return Datatables::of($bangunan)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                    $btn = '<div class="d-flex">';
                    $btn = $btn.' <a href="'. route('bangunan.edit', $row->id) .'" class="btn btn-info btn-sm" data-toggle="Edit" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;';
                    $btn = $btn. '<form action="' .route('bangunan.delete', $row->id) . '}" method="POST">
                                '.csrf_field().'
                                 '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="Hapus" data-placement="top" title="Hapus"
                                onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="fas fa-trash"></i></button>
                                </form>';
                    $btn = $btn. '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('bangunan.index', compact('pakets'));

    }

    public function create()
    {
        $provinsi = Province::all();
        $pakets = Paket::all();
        return view('bangunan.create', compact('pakets', 'provinsi'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'paket_id' => 'required',
            'name' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'status' => 'required',
            // 'tahun_konstruksi' => 'required',
        ]);

        $validateData['tahun_konstruksi'] = $request->tahun_konstruksi;
        Bangunan::create($validateData);
        return redirect()->route('bangunan.index')->with('success', 'Data berhasil ditambahkan');
        dd($request);
    }

    public function edit(Bangunan $bangunan)
    {
        $pakets = Paket::all();
        return view('bangunan.edit', compact('bangunan', 'pakets'));
    }

    public function update(Request $request, Bangunan $bangunan)
    {
        $validateData = $request->validate([
            'paket_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
        $bangunan['tahun_konstruksi'] = $request->tahun_konstruksi;
        $bangunan->update($validateData);
        return redirect()->route('bangunan.index')->with('success', 'Data berhasil diubah');
        //dd($request);
    }

    public function delete(Bangunan $bangunan)
    {
        $bangunan->delete();
        return redirect()->route('bangunan.index')->with('success', 'Data berhasil dihapus');
    }
}
