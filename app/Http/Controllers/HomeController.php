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
use Illuminate\Support\Facades\DB;

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
        $count_tahun_ajaran_santri = DB::table('santri')
                    ->select(DB::raw('SUBSTRING(tahun_ajaran, 1, 4) as tahun_ajaran'), DB::raw('count(*) as total'))
                    ->groupBy('tahun_ajaran')
                    ->pluck('total', 'tahun_ajaran')->all();

        $chart = new Santri;
        $chart->labels = (array_keys($count_tahun_ajaran_santri));
        $chart->dataset = (array_values($count_tahun_ajaran_santri));

        $chart->labels = str_replace('"', "", $chart->labels);

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
            'chart',
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

    public function asas()
    {
        // Get users grouped by age
        $groups = DB::table('users')
                        ->select('age', DB::raw('count(*) as total'))
                        ->groupBy('age')
                        ->pluck('total', 'age')->all();
        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
                    $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                }
        // Prepare the data for returning with the view
        $chart = new Chart;
                $chart->labels = (array_keys($groups));
                $chart->dataset = (array_values($groups));
                $chart->colours = $colours;
        return view('charts.index', compact('chart'));
    }
}
