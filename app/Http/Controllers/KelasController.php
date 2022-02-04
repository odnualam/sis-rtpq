<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Kelompok;
use App\Models\Santri;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $kelompok = Kelompok::all();

        return view('admin.kelas.index', compact('kelas', 'guru'));
    }

    public function create()
    {
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();

        return view('admin.kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        if ($request->id != '') {
            $this->validate($request, [
                'nama_kelas' => 'required|min:1|max:10',
                'guru_id' => 'required|unique:kelas,guru_id,'.$request->id,
            ]);
        } else {
            $this->validate($request, [
                'nama_kelas' => 'required|unique:kelas|min:1|max:10',
                'guru_id' => 'required|unique:kelas',
            ]);
        }

        Kelas::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'nama_kelas' => $request->nama_kelas,
                'guru_id' => $request->guru_id,
            ]
        );

        return redirect()->back()->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $countJadwal = Jadwal::where('kelas_id', $kelas->id)->count();
        if ($countJadwal >= 1) {
            Jadwal::where('kelas_id', $kelas->id)->delete();
        } else {
        }
        $countsantri = Santri::where('kelas_id', $kelas->id)->count();
        if ($countsantri >= 1) {
            Santri::where('kelas_id', $kelas->id)->delete();
        } else {
        }
        $kelas->delete();

        return redirect()->back()->with('warning', 'Data kelas berhasil dihapus!');
    }

    public function getEdit(Request $request)
    {
        $kelas = Kelas::where('id', $request->id)->get();
        foreach ($kelas as $val) {
            $newForm[] = [
                'id' => $val->id,
                'nama' => $val->nama_kelas,
                'guru_id' => $val->guru_id,
            ];
        }

        return response()->json($newForm);
    }
}
