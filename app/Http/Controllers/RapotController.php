<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Rapot;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PDF;

class RapotController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');

        return view('guru.rapot.kelas', compact('kelas', 'guru'));
    }

    public function showMapel($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $mengajar = Mengajar::where('kelas_id', $id)->where('guru_id', $guru->id)->get();
        $mengajar = $mengajar->groupBy('mapel_id');

        return view('guru.rapot.mapel', [
            'mengajar' => $mengajar,
        ]);
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
                    'mapel_id' => $request->mapel_id,
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
        $mengajar = Mengajar::where('id', $id)->firstOrFail();
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $kelas = Kelas::findorfail($mengajar->kelas_id);
        $santri = Santri::where('kelas_id', $mengajar->kelas_id)->get();

        return view('guru.rapot.rapot', compact('guru', 'kelas', 'santri', 'mengajar'));
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
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');
        $id = $santri->kelas_id;
        $absensi = DB::table('santri')
            ->leftJoin('absensi', function ($join) use ($id) {
                $join->on('santri.id', '=', 'absensi.santri_id')
                        ->where('absensi.tahun_ajaran', __tahun_ajaran__())
                        ->where('absensi.semester', __semester__(date('n')))
                        ->where('absensi.kelas_id', $id);
            })
            ->select('santri.id', 'santri.kelas_id', 'santri.nisn', 'santri.nama_santri', 'santri.jk', 'absensi.absen_s', 'absensi.absen_i', 'absensi.absen_a')
            ->where('santri.kelas_id', $id)
            ->where('santri.id', $santri->id)
            ->first();

        return view('santri.rapot', compact('santri', 'kelas', 'mapel', 'absensi'));
    }

    public function print()
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');
        $id = $santri->kelas_id;
        $absensi = DB::table('santri')
            ->leftJoin('absensi', function ($join) use ($id) {
                $join->on('santri.id', '=', 'absensi.santri_id')
                        ->where('absensi.tahun_ajaran', __tahun_ajaran__())
                        ->where('absensi.semester', __semester__(date('n')))
                        ->where('absensi.kelas_id', $id);
            })
            ->select('santri.id', 'santri.kelas_id', 'santri.nisn', 'santri.nama_santri', 'santri.jk', 'absensi.absen_s', 'absensi.absen_i', 'absensi.absen_a')
            ->where('santri.kelas_id', $id)
            ->where('santri.id', $santri->id)
            ->first();

        $pdf = PDF::loadview('santri.rapot-print', [
            'santri' => $santri,
            'kelas' => $kelas,
            'mapel' => $mapel,
            'absensi' => $absensi,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('rapot-santri');
    }
}
