<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        $kelas = Kelas::where('nama_kelas', $row[3])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/siswa/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/siswa/50271431012020_female.jpg';
        }

        return new Siswa([
            'nama_siswa' => $row[0],
            'no_induk' => $row[1],
            'jk' => $row[2],
            'foto' => $foto,
            'kelas_id' => $kelas->id,
        ]);
    }
}
