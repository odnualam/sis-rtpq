<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SantriExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $santri = Santri::join('kelas', 'kelas.id', '=', 'santri.kelas_id')->select('santri.nama_santri', 'santri.nisn', 'santri.jk', 'kelas.nama_kelas')->get();

        return $santri;
    }
}
