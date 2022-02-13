<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
use App\Imports\JadwalImport;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class JadwalController extends Controller
{
    public function index()
    {
        $hari = Hari::all();
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('id_card', 'asc')->get();
        $mapel = Mapel::OrderBy('kelompok_id', 'asc')->OrderBy('urutan', 'asc')->get();

        return view('admin.jadwal.index', compact('hari', 'kelas', 'guru', 'mapel'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hari_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $mengajar = Mengajar::where('kelas_id', $request->kelas_id)->first();
        Jadwal::updateOrCreate(
            [
                'id' => $request->jadwal_id,
            ],
            [
                'hari_id' => $request->hari_id,
                'kelas_id' => $request->kelas_id,
                'mapel_id' => $request->mapel_id,
                'guru_id' => $mengajar->guru_id,
                'jam_mulai' => date('H:i:s', strtotime($request->jam_mulai)),
                'jam_selesai' => date('H:i:s', strtotime($request->jam_selesai)),
            ]
        );

        return redirect()->back()->with('success', 'Data jadwal berhasil diperbarui!');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        $jadwal = Jadwal::OrderBy('hari_id', 'asc')->OrderBy('jam_mulai', 'asc')->where('kelas_id', $id)->get();

        return view('admin.jadwal.show', compact('jadwal', 'kelas'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $jadwal = Jadwal::findorfail($id);
        $hari = Hari::all();
        $kelas = Kelas::all();
        $guru = Guru::OrderBy('id_card', 'asc')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'hari', 'kelas', 'guru'));
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findorfail($id);
        $jadwal->delete();

        return redirect()->back()->with('warning', 'Data jadwal berhasil dihapus!');
    }

    public function view(Request $request)
    {
        $jadwal = Jadwal::OrderBy('hari_id', 'asc')->OrderBy('jam_mulai', 'asc')->where('kelas_id', $request->id)->get();
        foreach ($jadwal as $val) {
            $newForm[] = [
                'hari' => $val->hari->nama_hari,
                'mapel' => $val->mapel->nama_mapel,
                'kelas' => $val->kelas->nama_kelas,
                'guru' => $val->guru->nama_guru,
                'jam_mulai' => $val->jam_mulai,
                'jam_selesai' => $val->jam_selesai,
            ];
        }

        return response()->json($newForm);
    }

    public function jadwalSekarang(Request $request)
    {
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('hari_id', $request->hari)->where('jam_mulai', '<=', $request->jam)->where('jam_selesai', '>=', $request->jam)->get();
        foreach ($jadwal as $val) {
            $newForm[] = [
                'mapel' => $val->mapel->nama_mapel,
                'kelas' => $val->kelas->nama_kelas,
                'guru' => $val->guru->nama_guru,
                'jam_mulai' => $val->jam_mulai,
                'jam_selesai' => $val->jam_selesai,
                'ket' => $val->absen($val->guru_id),
            ];
        }

        return response()->json($newForm);
    }

    public function cetak_pdf(Request $request)
    {
        $jadwal = Jadwal::OrderBy('hari_id', 'asc')->OrderBy('jam_mulai', 'asc')->where('kelas_id', $request->id)->get();
        $kelas = Kelas::findorfail($request->id);
        $pdf = PDF::loadView('jadwal-pdf', ['jadwal' => $jadwal, 'kelas' => $kelas]);

        return $pdf->stream();
    }

    public function guru()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::orderBy('hari_id')->OrderBy('jam_mulai')->where('guru_id', $guru->id)->get();

        return view('guru.jadwal', compact('jadwal', 'guru'));
    }

    public function santri()
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $kelas = Kelas::findorfail($santri->kelas_id);
        $jadwal = Jadwal::orderBy('hari_id')->OrderBy('jam_mulai')->where('kelas_id', $kelas->id)->get();

        return view('santri.jadwal', compact('jadwal', 'kelas', 'santri'));
    }

    public function export_excel()
    {
        return Excel::download(new JadwalExport, 'jadwal.xlsx');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_jadwal', $nama_file);
        Excel::import(new JadwalImport, public_path('/file_jadwal/'.$nama_file));

        return redirect()->back()->with('success', 'Data Santri Berhasil Diimport!');
    }

    public function deleteAll()
    {
        $jadwal = Jadwal::all();
        if ($jadwal->count() >= 1) {
            Jadwal::whereNotNull('id')->delete();
            Jadwal::withTrashed()->whereNotNull('id')->forceDelete();

            return redirect()->back()->with('success', 'Data table jadwal berhasil dihapus!');
        } else {
            return redirect()->back()->with('warning', 'Data table jadwal kosong!');
        }
    }
}
