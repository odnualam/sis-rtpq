<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Santri;
use App\Models\Sikap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SikapController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');

        return view('guru.sikap.index', compact('kelas', 'guru'));
    }

    public function showMapel($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mengajar = Mengajar::where('kelas_id', $id)->where('guru_id', $guru->id)->get();
        $mengajar = $mengajar->groupBy('mapel_id');

        return view('guru.sikap.mapel', [
            'mengajar' => $mengajar
        ]);
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.sikap.home', compact('kelas'));
    }

    public function store(Request $request)
    {
        $guru = Guru::findorfail($request->guru_id);
        $cekJadwal = Jadwal::where('guru_id', $guru->id)->where('kelas_id', $request->kelas_id)->count();
        if ($cekJadwal >= 1) {
            Sikap::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'santri_id' => $request->santri_id,
                    'kelas_id' => $request->kelas_id,
                    'guru_id' => $request->guru_id,
                    'mapel_id' => $request->mapel_id,
                    'sikap_1' => $request->sikap_1,
                    'sikap_2' => $request->sikap_2,
                    'sikap_3' => $request->sikap_3,
                ]
            );

            return response()->json(['success' => 'Nilai sikap santri berhasil ditambahkan!']);
        } else {
            return response()->json(['error' => 'Maaf guru ini tidak mengajar kelas ini!']);
        }
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mengajar = Mengajar::where('id', $id)->firstOrFail();
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $kelas = Kelas::findorfail($mengajar->kelas_id);
        $santri = Santri::where('kelas_id', $mengajar->kelas_id)->get();

        return view('guru.sikap.show', compact('guru', 'kelas', 'santri', 'mengajar'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        $santri = Santri::orderBy('nama_santri')->where('kelas_id', $id)->get();

        return view('admin.sikap.index', compact('kelas', 'santri'));
    }

    public function sikap($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);
        $kelas = Kelas::findorfail($santri->kelas_id);
        $mapel = Mapel::all();

        return view('admin.sikap.show', compact('mapel', 'santri', 'kelas'));
    }

    public function santri()
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $mapel = Mapel::all();

        return view('santri.sikap', compact('santri', 'kelas', 'mapel'));
    }
}
