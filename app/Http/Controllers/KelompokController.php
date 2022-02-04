<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KelompokController extends Controller
{
    public function index()
    {
        $kelompok = Kelompok::all();

        return view('admin.kelompok.index', compact('kelompok'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'nama' => 'required',
        ]);

        Kelompok::updateOrCreate(
            [
                'id' => $request->kelompok_id,
            ],
            [
                'jenis' => $request->jenis,
                'nama' => $request->nama,
            ]
        );

        return redirect()->back()->with('success', 'Data kelompok berhasil diperbarui!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelompok = Kelompok::findorfail($id);

        return view('admin.kelompok.edit', compact('kelompok'));
    }

    public function destroy($id) {
        $kelompok = Kelompok::findOrFail($id);

        $kelompok->delete();

        return redirect()->back()->with('warning', 'Data kelompok berhasil dihapus!');
    }
}
