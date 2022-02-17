<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Mapel.
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $kelompok_id
 * @property int $urutan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Kelompok|null $kelompok
 * @method static Builder|Mapel newModelQuery()
 * @method static Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static Builder|Mapel query()
 * @method static Builder|Mapel whereCreatedAt($value)
 * @method static Builder|Mapel whereDeletedAt($value)
 * @method static Builder|Mapel whereId($value)
 * @method static Builder|Mapel whereKelompokId($value)
 * @method static Builder|Mapel whereNamaMapel($value)
 * @method static Builder|Mapel whereUpdatedAt($value)
 * @method static Builder|Mapel whereUrutan($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 * @mixin \Eloquent
 */
class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = [
        'id',
        'nama_mapel',
        'kelompok_id',
        'urutan',
    ];

    public function kelompok()
    {
        return $this->belongsTo('App\Models\Kelompok')->withDefault();
    }
}
