<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Mengajar;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Nilai::where('guru_id', $guru->id)->first();

        return view('guru.nilai', compact('nilai', 'guru'));
    }

    public function DeskripsiPredikat()
    {
        $jadwal = Jadwal::orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');

        return view('admin.nilai.deskripsi-predikat', [
            'kelas' => $kelas,
        ]);
    }

    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $mengajar = Mengajar::where('kelas_id', $id)->orderBy('mapel_id')->get();

        return view('admin.nilai.index', compact('mengajar'));
    }

    public function store(Request $request)
    {
        $guru = Guru::where('id', $request->guru_id)->first();

        Nilai::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'guru_id' => $guru->id,
                'kkm' => $request->kkm,
                'deskripsi_a' => $request->predikat_a,
                'deskripsi_b' => $request->predikat_b,
                'deskripsi_c' => $request->predikat_c,
                'deskripsi_d' => $request->predikat_d,
            ]
        );

        return redirect()->back()->with('success', 'Data nilai kkm dan predikat berhasil diperbarui!');
    }
}
