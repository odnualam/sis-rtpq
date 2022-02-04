<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MengajarController extends Controller
{
    public function index()
    {
        $mapel = Mapel::OrderBy('kelompok_id', 'asc')->OrderBy('urutan', 'asc')->get();
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('kode', 'asc')->get();
        $mengajar  = Mengajar::all();

        return view('admin.mengajar.index', compact('mapel', 'kelas', 'guru', 'mengajar'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mapel = Mapel::OrderBy('kelompok_id', 'asc')->OrderBy('urutan', 'asc')->get();
        $kelas = Kelas::findorfail($id);
        $guru = Guru::OrderBy('kode', 'asc')->get();
        $mengajar  = Mengajar::where('kelas_id', $id)->get();

        return view('admin.mengajar.show', compact('mapel', 'kelas', 'guru', 'mengajar'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
        ]);

        Mengajar::updateOrCreate(
            [
                'id' => $request->mengajar_id,
            ],
            [
                'kelas_id' => $request->kelas_id,
                'mapel_id' => $request->mapel_id,
                'guru_id' => $request->guru_id,
            ]
        );

        return redirect()->back()->with('success', 'Data Mengajar berhasil diperbarui!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $mengajar  = Mengajar::findorfail($id);
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('kode', 'asc')->get();
        $mapel = Mapel::OrderBy('kelompok_id', 'asc')->OrderBy('urutan', 'asc')->get();

        return view('admin.mengajar.edit', compact('mengajar', 'mapel', 'kelas', 'guru', 'mapel'));
    }

    public function destroy($id)
    {
        $mengajar = Mengajar::findorfail($id);
        $mengajar->delete();

        return redirect()->back()->with('warning', 'Data mengajar berhasil dihapus!');
    }
}
