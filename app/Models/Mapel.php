<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Mapel.
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $paket_id
 * @property int $urutan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Paket|null $paket
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel wherePaketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUrutan($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 * @mixin \Eloquent
 */
class Mapel extends Model
{
    use SoftDeletes;

    protected $table = 'mapel';

    protected $fillable = ['id', 'nama_mapel', 'paket_id', 'urutan'];

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket')->withDefault();
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
