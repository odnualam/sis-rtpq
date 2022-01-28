<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;

class SantriImport implements ToModel
{
    public function model(array $row)
    {
        $kelas = Kelas::where('nama_kelas', $row[3])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/santri/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/santri/50271431012020_female.jpg';
        }

        return new Santri([
            'nama_santri' => $row[0],
            'nisn' => $row[1],
            'jk' => $row[2],
            'foto' => $foto,
            'kelas_id' => $kelas->id,
        ]);
    }
}
