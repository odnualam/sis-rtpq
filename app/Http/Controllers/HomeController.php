<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Paket;
use App\Models\Pengumuman;
use App\Models\Santri;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        activity()
        ->performedOn(User::firstOrFail())
        ->withProperties(['role'=>auth()->user()->role, 'by'=>auth()->user()->name])
        ->causedBy(auth()->user())
        ->log('Login');

        $hari = date('w');
        $jam = date('H:i');
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('hari_id', $hari)->where('jam_mulai', '<=', $jam)->where('jam_selesai', '>=', $jam)->get();
        $pengumuman = Pengumuman::first();

        return view('home', compact('jadwal', 'pengumuman'));
    }

    public function admin()
    {
        activity()
            ->performedOn(User::firstOrFail())
            ->withProperties(['role'=>auth()->user()->role, 'by'=>auth()->user()->name])
            ->causedBy(auth()->user())
            ->log('Login');

        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $santri = Santri::count();
        $santrilk = Santri::where('jk', 'L')->count();
        $santripr = Santri::where('jk', 'P')->count();
        $kelas = Kelas::count();
        $bkp = Kelas::where('paket_id', '1')->count();
        $dpib = Kelas::where('paket_id', '2')->count();
        $ei = Kelas::where('paket_id', '3')->count();
        $oi = Kelas::where('paket_id', '4')->count();
        $tbsm = Kelas::where('paket_id', '6')->count();
        $rpl = Kelas::where('paket_id', '7')->count();
        $tpm = Kelas::where('paket_id', '5')->count();
        $las = Kelas::where('paket_id', '8')->count();
        $mapel = Mapel::count();
        $user = User::count();
        $paket = Paket::all();
        $activity_log = ActivityLog::with('user')->limit(10)->orderBy('id', 'DESC')->get();
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
            'bkp',
            'dpib',
            'ei',
            'oi',
            'tbsm',
            'rpl',
            'tpm',
            'las',
            'mapel',
            'user',
            'paket',
            'activity_log',
            'pengumuman'
        ));
    }
}
