<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Bangunan;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Village;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;


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
        //dd($request);
    }

    public function edit(Bangunan $bangunan)
    {
        $pakets = Paket::all();
        $provinsi = \Indonesia::allProvinces();


        $kota1 =  \Indonesia::findCity($bangunan->city_id, $with = null);
        $kota = City::where('province_code', '=', $kota1->province->code)->get();

        $kecamatan1 = \Indonesia::findDistrict($bangunan->district_id, $with = null);
        $kecamatan = District::where('city_code', '=', $kecamatan1->city->code)->get();

        $desa1 = \Indonesia::findVillage($bangunan->village_id, $with = null);
        $desa = Village::where('district_code', '=', $desa1->district->code)->get();

        return view('bangunan.edit', compact(
            'bangunan', 
            'pakets', 
            'provinsi',
            'kota',
            'kecamatan',
            'desa'
        ));
        //dd($kecamatan);
    }

    public function update(Request $request, Bangunan $bangunan)
    {
        $validateData = $request->validate([
            'paket_id' => 'required',
            'name' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
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
