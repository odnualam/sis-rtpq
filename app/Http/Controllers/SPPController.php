<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function index()
    {
        $spp = SPP::all();

        return view('admin.spp.index', [
            'spp' => $spp,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        SPP::updateOrCreate(
            [
                'id' => $request->spp_id,
            ],
            [
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]
        );

        return redirect()->back()->with('success', 'Berhasil simpan data spp baru!');
    }

    public function edit($id)
    {
        $spp = SPP::findorfail($id);

        return view('admin.spp.edit', compact('spp'));
    }

    public function destroy($id) {
        $spp = SPP::findOrFail($id);
        $spp->delete();

        return redirect()->back()->with('warning', 'Data spp berhasil dihapus!');
    }
}
