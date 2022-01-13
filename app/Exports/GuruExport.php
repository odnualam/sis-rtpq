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
        $guru = Guru::join('mapel', 'mapel.id', '=', 'guru.mapel_id')->select('guru.nama_guru', 'guru.nip', 'guru.jk', 'mapel.nama_mapel')->get();

        return $guru;
    }
}
