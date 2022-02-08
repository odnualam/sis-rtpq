<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::OrderBy('kelompok_id', 'asc')->OrderBy('urutan', 'asc')->get();
        $kelompok = Kelompok::all();

        return view('admin.mapel.index', compact('mapel', 'kelompok'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_mapel' => 'required',
            'kelompok_id' => 'required',
            'urutan' => 'required',
        ]);

        Mapel::updateOrCreate(
            [
                'id' => $request->mapel_id,
            ],
            [
                'nama_mapel' => $request->nama_mapel,
                'kelompok_id' => $request->kelompok_id,
                'urutan' => $request->urutan,
            ]
        );

        return redirect()->back()->with('success', 'Data mapel berhasil diperbarui!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $mapel = Mapel::findorfail($id);
        $kelompok = Kelompok::all();

        return view('admin.mapel.edit', compact('mapel', 'kelompok'));
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $countJadwal = Jadwal::where('mapel_id', $mapel->id)->count();
        if ($countJadwal >= 1) {
            $jadwal = Jadwal::where('mapel_id', $mapel->id)->delete();
        } else {
        }
        $countGuru = Guru::where('mapel_id', $mapel->id)->count();
        if ($countGuru >= 1) {
            $guru = Guru::where('mapel_id', $mapel->id)->delete();
        } else {
        }
        $mapel->delete();

        return redirect()->back()->with('warning', 'Data mapel berhasil dihapus!');
    }

    public function getMapelJson(Request $request)
    {
        $jadwal = Jadwal::OrderBy('mapel_id', 'asc')->where('kelas_id', $request->kelas_id)->get();
        $jadwal = $jadwal->groupBy('mapel_id');

        foreach ($jadwal as $val => $data) {
            $newForm[] = [
                'mapel' => $data[0]->pelajaran($val)->nama_mapel,
                'guru' => $data[0]->pengajar($data[0]->guru_id)->id,
            ];
        }

        return response()->json($newForm);
    }
}
