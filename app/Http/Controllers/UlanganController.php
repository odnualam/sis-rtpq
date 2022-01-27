<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Rapot;
use App\Models\Santri;
use App\Models\Ulangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UlanganController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');

        return view('guru.ulangan.kelas', compact('kelas', 'guru'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.ulangan.home', compact('kelas'));
    }

    public function store(Request $request)
    {
        $guru = Guru::findorfail($request->guru_id);
        $cekJadwal = Jadwal::where('guru_id', $guru->id)->where('kelas_id', $request->kelas_id)->count();

        if ($cekJadwal >= 1) {
            if ($request->ulha_1 && $request->ulha_2 && $request->uts && $request->ulha_3 && $request->uas) {
                $nilai = ($request->ulha_1 + $request->ulha_2 + $request->uts + $request->ulha_3 + (2 * $request->uas)) / 6;
                $nilai = (int) $nilai;
                $deskripsi = Nilai::where('guru_id', $request->guru_id)->first();
                $isi = Nilai::where('guru_id', $request->guru_id)->count();
                if ($isi >= 1) {
                    if ($nilai > 90) {
                        Rapot::create([
                            'santri_id' => $request->santri_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'mapel_id' => $guru->mapel_id,
                            'p_nilai' => $nilai,
                            'p_predikat' => 'A',
                            'p_deskripsi' => $deskripsi->deskripsi_a,
                        ]);
                    } elseif ($nilai > 80) {
                        Rapot::create([
                            'santri_id' => $request->santri_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'mapel_id' => $guru->mapel_id,
                            'p_nilai' => $nilai,
                            'p_predikat' => 'B',
                            'p_deskripsi' => $deskripsi->deskripsi_b,
                        ]);
                    } elseif ($nilai > 70) {
                        Rapot::create([
                            'santri_id' => $request->santri_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'mapel_id' => $guru->mapel_id,
                            'p_nilai' => $nilai,
                            'p_predikat' => 'C',
                            'p_deskripsi' => $deskripsi->deskripsi_c,
                        ]);
                    } else {
                        Rapot::create([
                            'santri_id' => $request->santri_id,
                            'kelas_id' => $request->kelas_id,
                            'guru_id' => $request->guru_id,
                            'mapel_id' => $guru->mapel_id,
                            'p_nilai' => $nilai,
                            'p_predikat' => 'D',
                            'p_deskripsi' => $deskripsi->deskripsi_d,
                        ]);
                    }
                } else {
                    return response()->json(['error' => 'Tolong masukkan deskripsi predikat anda terlebih dahulu!']);
                }
            } else {
            }
            Ulangan::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'santri_id' => $request->santri_id,
                    'kelas_id' => $request->kelas_id,
                    'guru_id' => $request->guru_id,
                    'mapel_id' => $guru->mapel_id,
                    'ulha_1' => $request->ulha_1,
                    'ulha_2' => $request->ulha_2,
                    'uts' => $request->uts,
                    'ulha_3' => $request->ulha_3,
                    'uas' => $request->uas,
                ]
            );

            return response()->json(['success' => 'Nilai ulangan santri berhasil ditambahkan!']);
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

        return view('guru.ulangan.nilai', compact('guru', 'kelas', 'santri'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        $santri = Santri::orderBy('nama_santri')->where('kelas_id', $id)->get();

        return view('admin.ulangan.index', compact('kelas', 'santri'));
    }

    public function ulangan($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);
        $kelas = Kelas::findorfail($santri->kelas_id);
        $jadwal = Jadwal::orderBy('mapel_id')->where('kelas_id', $kelas->id)->get();
        $mapel = $jadwal->groupBy('mapel_id');

        return view('admin.ulangan.show', compact('mapel', 'santri', 'kelas'));
    }

    public function santri()
    {
        $santri = Santri::where('no_induk', Auth::user()->no_induk)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');

        return view('santri.ulangan', compact('santri', 'kelas', 'mapel'));
    }
}
