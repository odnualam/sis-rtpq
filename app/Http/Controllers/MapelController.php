<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::OrderBy('kelompok', 'asc')->OrderBy('nama_mapel', 'asc')->get();
        $paket = Paket::all();

        return view('admin.mapel.index', compact('mapel', 'paket'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_mapel' => 'required',
            'paket_id' => 'required',
            'kelompok' => 'required',
        ]);

        Mapel::updateOrCreate(
            [
                'id' => $request->mapel_id,
            ],
            [
                'nama_mapel' => $request->nama_mapel,
                'paket_id' => $request->paket_id,
                'kelompok' => $request->kelompok,
            ]
        );

        return redirect()->back()->with('success', 'Data mapel berhasil diperbarui!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $mapel = Mapel::findorfail($id);
        $paket = Paket::all();

        return view('admin.mapel.edit', compact('mapel', 'paket'));
    }

    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);
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

        return redirect()->back()->with('warning', 'Data mapel berhasil dihapus! (Silahkan cek trash data mapel)');
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
