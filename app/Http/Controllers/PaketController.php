<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $paket = Paket::query();
            return Datatables::of($paket)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                    $btn = '<div class="d-flex">';
                    $btn = $btn.' <a href="'. route('paket.edit', $row->id) .'" class="btn btn-info btn-sm" data-toggle="Edit" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;';
                    $btn = $btn. '<form action="' .route('paket.delete', $row->id) . '}" method="POST">
                                '.csrf_field().'
                                 '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="Edit" data-placement="top" title="Hapus"
                                onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="fas fa-trash"></i></button>
                                </form>';
                    $btn = $btn. '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('paket.index');
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun_anggaran' => 'required',
            'name' => 'required',
            'no_kontrak' => '',
            'tgl_kontrak' => '',
            'penyedia_jasa' => '',
        ]);
        

        Paket::create($validateData);
        return redirect()->route('paket.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $validateData = $request->validate([
            'tahun_anggaran' => 'required',
            'name' => 'required',
            'no_kontrak' => '',
            'tgl_kontrak' => '',
            'penyedia_jasa' => '',
        ]);

        $paket->update($validateData);
        return redirect()->route('paket.index')->with('success', 'Data berhasil diubah');
    }

    public function delete(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Data berhasil dihapus');
    }
}
