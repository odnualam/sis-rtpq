<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Rapot;
use App\Models\Santri;
use App\Models\Sikap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RapotController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');

        return view('guru.rapot.kelas', compact('kelas', 'guru'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.rapot.home', compact('kelas'));
    }

    public function store(Request $request)
    {
        $guru = Guru::findorfail($request->guru_id);
        $cekJadwal = Jadwal::where('guru_id', $guru->id)->where('kelas_id', $request->kelas_id)->count();
        if ($cekJadwal >= 1) {
            Rapot::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'santri_id' => $request->santri_id,
                    'kelas_id' => $request->kelas_id,
                    'guru_id' => $request->guru_id,
                    'mapel_id' => $guru->mapel_id,
                    'k_nilai' => $request->nilai,
                    'k_predikat' => $request->predikat,
                    'k_deskripsi' => $request->deskripsi,
                ]
            );

            return response()->json(['success' => 'Nilai rapot santri berhasil ditambahkan!']);
        } else {
            return response()->json(['error' => 'Maaf guru ini tidak mengajar kelas ini!']);
        }
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $kelas = Kelas::findorfail($id);
        $santri = Santri::where('kelas_id', $id)->get();

        return view('guru.rapot.rapot', compact('guru', 'kelas', 'santri'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        $santri = Santri::orderBy('nama_santri')->where('kelas_id', $id)->get();

        return view('admin.rapot.index', compact('kelas', 'santri'));
    }

    public function rapot($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);
        $kelas = Kelas::findorfail($santri->kelas_id);
        $jadwal = Jadwal::orderBy('mapel_id')->where('kelas_id', $kelas->id)->get();
        $mapel = $jadwal->groupBy('mapel_id');

        return view('admin.rapot.show', compact('mapel', 'santri', 'kelas'));
    }

    public function predikat(Request $request)
    {
        $nilai = Nilai::where('guru_id', $request->id)->first();
        if ($request->nilai > 90) {
            $newForm[] = [
                'predikat' => 'A',
                'deskripsi' => $nilai->deskripsi_a,
            ];
        } elseif ($request->nilai > 80) {
            $newForm[] = [
                'predikat' => 'B',
                'deskripsi' => $nilai->deskripsi_b,
            ];
        } elseif ($request->nilai > 60) {
            $newForm[] = [
                'predikat' => 'C',
                'deskripsi' => $nilai->deskripsi_c,
            ];
        } else {
            $newForm[] = [
                'predikat' => 'D',
                'deskripsi' => $nilai->deskripsi_d,
            ];
        }

        return response()->json($newForm);
    }

    public function santri()
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $pai = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->first();
        $ppkn = Mapel::where('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->first();
        if ($pai != null && $ppkn != null) {
            $Spai = Sikap::where('santri_id', $santri->id)->where('mapel_id', $pai->id)->first();
            $Sppkn = Sikap::where('santri_id', $santri->id)->where('mapel_id', $ppkn->id)->first();
        } else {
            $Spai = '';
            $Sppkn = '';
        }
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');

        return view('santri.rapot', compact('santri', 'kelas', 'mapel', 'Spai', 'Sppkn'));
    }
}
