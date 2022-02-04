<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Mapel
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $kelompok_id
 * @property int $urutan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Kelompok|null $kelompok
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereKelompokId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUrutan($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 * @mixin \Eloquent
 */
class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = ['id', 'nama_mapel', 'kelompok_id', 'urutan'];

    public function kelompok()
    {
        return $this->belongsTo('App\Models\Kelompok')->withDefault();
    }

    public function sikap($id)
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $nilai = Sikap::where('santri_id', $santri->id)->where('mapel_id', $id)->first();

        return $nilai;
    }

    public function cekSikap($id)
    {
        $data = json_decode($id, true);
        $sikap = Sikap::where('santri_id', $data['santri'])->where('mapel_id', $data['mapel'])->first();

        return $sikap;
    }
}
