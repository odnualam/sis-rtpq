<?php

namespace App\Http\Controllers;

use App\Exports\santriExport;
use App\Imports\santriImport;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SantriController extends Controller
{
    public function index()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();

        return view('admin.santri.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|string|unique:santri',
            'nama_santri' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required',
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $new_foto = date('siHdmY').'_'.$foto->getClientOriginalName();
            $foto->move('uploads/santri/', $new_foto);
            $nameFoto = 'uploads/santri/'.$new_foto;
        } else {
            if ($request->jk == 'L') {
                $nameFoto = 'uploads/santri/52471919042020_male.jpg';
            } else {
                $nameFoto = 'uploads/santri/50271431012020_female.jpg';
            }
        }

        Santri::create([
            'nisn' => $request->nisn,
            'nama_santri' => $request->nama_santri,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'foto' => $nameFoto,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data santri baru!');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);

        return view('admin.santri.details', compact('santri'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);
        $kelas = Kelas::all();

        return view('admin.santri.edit', compact('santri', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_santri' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required',
        ]);

        $santri = Santri::findorfail($id);
        $user = User::where('nisn', $santri->nisn)->first();
        if ($user) {
            $user_data = [
                'name' => $request->nama_santri,
            ];
            $user->update($user_data);
        } else {
        }
        $santri_data = [
            'nama_santri' => $request->nama_santri,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
        ];
        $santri->update($santri_data);

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $santri = Santri::findorfail($id);
        $countUser = User::where('nisn', $santri->nisn)->count();
        if ($countUser >= 1) {
            $user = User::where('nisn', $santri->nisn)->first();
            $santri->delete();
            $user->delete();

            return redirect()->back()->with('warning', 'Data santri berhasil dihapus!');
        } else {
            $santri->delete();

            return redirect()->back()->with('warning', 'Data santri berhasil dihapus!');
        }
    }

    public function ubah_foto($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::findorfail($id);

        return view('admin.santri.ubah-foto', compact('santri'));
    }

    public function update_foto(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required',
        ]);

        $santri = Santri::findorfail($id);
        $foto = $request->foto;
        $new_foto = date('s'.'i'.'H'.'d'.'m'.'Y').'_'.$foto->getClientOriginalName();
        $santri_data = [
            'foto' => 'uploads/santri/'.$new_foto,
        ];
        $foto->move('uploads/santri/', $new_foto);
        $santri->update($santri_data);

        return redirect()->route('santri.index')->with('success', 'Berhasil merubah foto!');
    }

    public function view(Request $request)
    {
        $santri = Santri::OrderBy('nama_santri', 'asc')->where('kelas_id', $request->id)->get();

        foreach ($santri as $val) {
            $newForm[] = [
                'kelas' => $val->kelas->nama_kelas,
                'nisn' => $val->nisn,
                'nama_santri' => $val->nama_santri,
                'jk' => $val->jk,
                'foto' => $val->foto,
            ];
        }

        return response()->json($newForm);
    }

    public function cetak_pdf(Request $request)
    {
        $santri = santri::OrderBy('nama_santri', 'asc')->where('kelas_id', $request->id)->get();
        $kelas = Kelas::findorfail($request->id);

        $pdf = PDF::loadView('santri-pdf', ['santri' => $santri, 'kelas' => $kelas]);

        return $pdf->stream();
        // return $pdf->stream('jadwal-pdf.pdf');
    }

    public function kelas($id)
    {
        $id = Crypt::decrypt($id);
        $santri = Santri::where('kelas_id', $id)->OrderBy('nama_santri', 'asc')->get();
        $kelas = Kelas::findorfail($id);

        return view('admin.santri.show', compact('santri', 'kelas'));
    }

    public function export_excel()
    {
        return Excel::download(new santriExport, 'santri.xlsx');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_santri', $nama_file);
        Excel::import(new santriImport, public_path('/file_santri/'.$nama_file));

        return redirect()->back()->with('success', 'Data Santri Berhasil Diimport!');
    }

    public function deleteAll()
    {
        $santri = Santri::all();
        if ($santri->count() >= 1) {
            Santri::whereNotNull('id')->delete();
            Santri::withTrashed()->whereNotNull('id')->forceDelete();

            return redirect()->back()->with('success', 'Data table santri berhasil dihapus!');
        } else {
            return redirect()->back()->with('warning', 'Data table santri kosong!');
        }
    }
}
