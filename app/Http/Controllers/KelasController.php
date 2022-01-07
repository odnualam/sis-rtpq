<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Paket;
use App\Jadwal;
use App\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $paket = Paket::all();
        return view('admin.kelas.index', compact('kelas', 'guru', 'paket'));
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
                'nama_kelas' => 'required|min:6|max:10',
                'paket_id' => 'required',
                'guru_id' => 'required|unique:kelas',
            ]);
        } else {
            $this->validate($request, [
                'nama_kelas' => 'required|unique:kelas|min:6|max:10',
                'paket_id' => 'required',
                'guru_id' => 'required|unique:kelas',
            ]);
        }

        Kelas::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nama_kelas' => $request->nama_kelas,
                'paket_id' => $request->paket_id,
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
        $countSiswa = Siswa::where('kelas_id', $kelas->id)->count();
        if ($countSiswa >= 1) {
            Siswa::where('kelas_id', $kelas->id)->delete();
        } else {
        }
        $kelas->delete();
        return redirect()->back()->with('warning', 'Data kelas berhasil dihapus! (Silahkan cek trash data kelas)');
    }

    public function getEdit(Request $request)
    {
        $kelas = Kelas::where('id', $request->id)->get();
        foreach ($kelas as $val) {
            $newForm[] = array(
                'id' => $val->id,
                'nama' => $val->nama_kelas,
                'paket_id' => $val->paket_id,
                'guru_id' => $val->guru_id,
            );
        }
        return response()->json($newForm);
    }
}
