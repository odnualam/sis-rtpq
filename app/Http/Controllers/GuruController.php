<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Imports\GuruImport;
use App\Models\Absen;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $max = Guru::max('id_card');
        $guru = Guru::all();

        return view('admin.guru.index', compact('mapel', 'max', 'guru'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nik' => 'required',
            'id_card' => 'required',
            'pendidikan' => 'required',
            'nama_guru' => 'required',
            'jk' => 'required',
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $new_foto = date('siHdmY').'_'.$foto->getClientOriginalName();
            $foto->move('uploads/guru/', $new_foto);
            $nameFoto = 'uploads/guru/'.$new_foto;
        } else {
            $nameFoto = 'uploads/guru/32421817012022_default-avatar.png';
        }

        $guru = Guru::create([
            'nik' => $request->id_card,
            'id_card' => $request->id_card,
            'pendidikan' => $request->pendidikan,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'telp' => $request->telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'foto' => $nameFoto,
        ]);

        Nilai::create([
            'guru_id' => $guru->id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data guru baru!');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);

        return view('admin.guru.details', compact('guru'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        $mapel = Mapel::all();

        return view('admin.guru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_guru' => 'required',
            'jk' => 'required',
        ]);

        $guru = Guru::findorfail($id);
        $user = User::where('id_card', $guru->id_card)->first();
        if ($user) {
            $user_data = [
                'name' => $request->nama_guru,
            ];
            $user->update($user_data);
        } else {
        }
        $guru_data = [
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'telp' => $request->telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
        ];
        $guru->update($guru_data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $countJadwal = Jadwal::where('guru_id', $guru->id)->count();
        if ($countJadwal >= 1) {
            $jadwal = Jadwal::where('guru_id', $guru->id)->delete();
        } else {
        }
        $countUser = User::where('id_card', $guru->id_card)->count();
        if ($countUser >= 1) {
            $user = User::where('id_card', $guru->id_card)->delete();
        } else {
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('warning', 'Data guru berhasil dihapus!');
    }

    public function ubah_foto($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);

        return view('admin.guru.ubah-foto', compact('guru'));
    }

    public function update_foto(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required',
        ]);

        $guru = Guru::findorfail($id);
        $foto = $request->foto;
        $new_foto = date('s'.'i'.'H'.'d'.'m'.'Y').'_'.$foto->getClientOriginalName();
        $guru_data = [
            'foto' => 'uploads/guru/'.$new_foto,
        ];
        $foto->move('uploads/guru/', $new_foto);
        $guru->update($guru_data);

        return redirect()->route('guru.index')->with('success', 'Berhasil merubah foto!');
    }

    public function absensi()
    {
        $guru = Guru::where('id_card', auth()->user()->id_card)->firstOrFail();
        $wali_kelas = Kelas::where('guru_id', $guru->id)->firstOrFail();

        $id = $wali_kelas->id;

        $kelas = Kelas::findorfail($id);

        $santri = DB::table('santri')
            ->leftJoin('absensi', function ($join) use ($id) {
                $join->on('santri.id', '=', 'absensi.santri_id')
                        ->where('absensi.tahun_ajaran', __tahun_ajaran__())
                        ->where('absensi.semester', __semester__(date('n')))
                        ->where('absensi.kelas_id', $id);
            })
            ->select('santri.id', 'santri.kelas_id', 'santri.nisn', 'santri.nama_santri', 'santri.jk', 'absensi.absen_s', 'absensi.absen_i', 'absensi.absen_a')
            ->where('santri.kelas_id', $id)
            ->groupBy('santri.id')
            ->get();

        return view('guru.absensi.index', compact('santri', 'kelas'));
    }

    public function simpan(Request $request)
    {
        $now = Absen::where('santri_id', $request->santri_id)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->where('kelas_id', $request->kelas_id)
            ->first();

        if ($now != null) {
            foreach ($request->input('santri_id') as $key => $value) {
                if (! empty($request->input('santri_id.'.$key))) {
                    $data = [
                        'absen_s' => $request->input('absen_s.'.$key),
                        'absen_i' => $request->input('absen_i.'.$key),
                        'absen_a' => $request->input('absen_a.'.$key),
                    ];

                    Absen::where('santri_id', $request->input('santri_id.'.$key))
                    ->where('tahun_ajaran', $request->tahun_ajaran)
                    ->where('semester', $request->semester)
                    ->where('kelas_id', $request->kelas_id)
                    ->update($data);
                }
            }
        } else {
            foreach ($request->input('santri_id') as $key => $value) {
                Absen::create([
                    'tahun_ajaran' => $request->tahun_ajaran,
                    'semester' => $request->semester,
                    'kelas_id' => $request->kelas_id,
                    'santri_id' => $request->input('santri_id.'.$key),
                    'absen_s' => $request->input('absen_s.'.$key),
                    'absen_i' => $request->input('absen_i.'.$key),
                    'absen_a' => $request->input('absen_a.'.$key),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data Absensi Santri Berhasil Diperbaharui.');
    }

    public function kehadiran($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        $absen = Absen::orderBy('tanggal', 'desc')->where('guru_id', $id)->get();

        return view('admin.guru.kehadiran', compact('guru', 'absen'));
    }

    public function export_excel()
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_guru', $nama_file);
        Excel::import(new GuruImport, public_path('/file_guru/'.$nama_file));

        return redirect()->back()->with('success', 'Data Guru Berhasil Diimport!');
    }

    public function deleteAll()
    {
        $guru = Guru::all();
        if ($guru->count() >= 1) {
            Guru::whereNotNull('id')->delete();
            Guru::withTrashed()->whereNotNull('id')->forceDelete();

            return redirect()->back()->with('success', 'Data table guru berhasil dihapus!');
        } else {
            return redirect()->back()->with('warning', 'Data table guru kosong!');
        }
    }

    public function RekapAbsensi()
    {
        $kelas = Kelas::orderBy('id')->get();

        return view('admin.absensi.index', compact('kelas'));
    }

    public function RekapAbsensiShow($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);

        $santri = DB::table('santri')
            ->leftJoin('absensi', function ($join) use ($id) {
                $join->on('santri.id', '=', 'absensi.santri_id')
                        ->where('absensi.tahun_ajaran', __tahun_ajaran__())
                        ->where('absensi.semester', __semester__(date('n')))
                        ->where('absensi.kelas_id', $id);
            })
            ->select('santri.id', 'santri.kelas_id', 'santri.nisn', 'santri.nama_santri', 'santri.jk', 'absensi.absen_s', 'absensi.absen_i', 'absensi.absen_a')
            ->where('santri.kelas_id', $id)
            ->groupBy('santri.id')
            ->get();

        return view('admin.absensi.show', compact('santri', 'kelas'));
    }
}
