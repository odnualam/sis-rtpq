<?php

namespace App\Exports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $guru = Guru::select('guru.nama_guru', 'guru.pendidikan', 'guru.jk', 'mapel.nama_mapel')->get();

        return $guru;
    }
}
