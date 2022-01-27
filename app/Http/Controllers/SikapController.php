<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
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
        if (
            $guru->mapel->nama_mapel == 'Pendidikan Agama dan Budi Pekerti' ||
            $guru->mapel->nama_mapel == 'Pendidikan Pancasila dan Kewarganegaraan'
        ) {
            $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
            $kelas = $jadwal->groupBy('kelas_id');

            return view('guru.sikap.index', compact('kelas', 'guru'));
        } else {
            return redirect()->back()->with('error', 'Maaf guru ini tidak dapat menambahkan nilai sikap!');
        }
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
            if (
                $guru->mapel->nama_mapel == 'Pendidikan Agama dan Budi Pekerti' ||
                $guru->mapel->nama_mapel == 'Pendidikan Pancasila dan Kewarganegaraan'
            ) {
                Sikap::updateOrCreate(
                    [
                        'id' => $request->id,
                    ],
                    [
                        'santri_id' => $request->santri_id,
                        'kelas_id' => $request->kelas_id,
                        'guru_id' => $request->guru_id,
                        'mapel_id' => $guru->mapel_id,
                        'sikap_1' => $request->sikap_1,
                        'sikap_2' => $request->sikap_2,
                        'sikap_3' => $request->sikap_3,
                    ]
                );

                return response()->json(['success' => 'Nilai sikap santri berhasil ditambahkan!']);
            } else {
                return redirect()->json(['error' => 'Maaf guru ini tidak dapat menambahkan nilai sikap!']);
            }
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

        return view('guru.sikap.show', compact('guru', 'kelas', 'santri'));
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
        $mapel = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->orWhere('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->get();

        return view('admin.sikap.show', compact('mapel', 'santri', 'kelas'));
    }

    public function santri()
    {
        $santri = Santri::where('no_induk', Auth::user()->no_induk)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $mapel = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->orWhere('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->get();

        return view('santri.sikap', compact('santri', 'kelas', 'mapel'));
    }
}
