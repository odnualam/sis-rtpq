<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Kelompok;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\Santri;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $hari = date('w');
        $jam = date('H:i');
        $guru_count = Guru::count();
        $kelas = Kelas::count();
        $santri = Santri::count();
        $mapel = Mapel::count();
        if (auth()->user()->role == 'Guru') {
            $guru = Guru::where('id_card', Auth::user()->id_card)->first();
            $jadwal = Jadwal::orderBy('hari_id')->OrderBy('jam_mulai')->where('guru_id', $guru->id)->where('hari_id', $hari)->get();
        } else {
            $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('kelas_id', )->where('hari_id', $hari)->get();
        }
        $pengumuman = Pengumuman::first();

        return view('home', compact('jadwal', 'pengumuman', 'guru_count', 'santri', 'kelas', 'mapel'));
    }

    public function admin()
    {
        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $santri = Santri::count();
        $santrilk = Santri::where('jk', 'L')->count();
        $santripr = Santri::where('jk', 'P')->count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $user = User::count();
        $kelompok = Kelompok::all();
        $activity_log = ActivityLog::with('user')->latest()->get();
        $pengumuman = Pengumuman::first();

        return view('admin.index', compact(
            'jadwal',
            'guru',
            'gurulk',
            'gurupr',
            'santrilk',
            'santripr',
            'santri',
            'kelas',
            'mapel',
            'user',
            'kelompok',
            'activity_log',
            'pengumuman'
        ));
    }
}
