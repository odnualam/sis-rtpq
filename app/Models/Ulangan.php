<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Ulangan.
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $ulha_1
 * @property string|null $ulha_2
 * @property string|null $uts
 * @property string|null $ulha_3
 * @property string|null $uas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Ulangan newModelQuery()
 * @method static Builder|Ulangan newQuery()
 * @method static Builder|Ulangan query()
 * @method static Builder|Ulangan whereCreatedAt($value)
 * @method static Builder|Ulangan whereGuruId($value)
 * @method static Builder|Ulangan whereId($value)
 * @method static Builder|Ulangan whereKelasId($value)
 * @method static Builder|Ulangan whereMapelId($value)
 * @method static Builder|Ulangan whereSantriId($value)
 * @method static Builder|Ulangan whereUas($value)
 * @method static Builder|Ulangan whereUlha1($value)
 * @method static Builder|Ulangan whereUlha2($value)
 * @method static Builder|Ulangan whereUlha3($value)
 * @method static Builder|Ulangan whereUpdatedAt($value)
 * @method static Builder|Ulangan whereUts($value)
 * @mixin \Eloquent
 */
class Ulangan extends Model
{
    use HasFactory;

    protected $table = 'ulangan';

    protected $fillable = [
        'santri_id',
        'kelas_id',
        'guru_id',
        'mapel_id',
        'ulha_1',
        'ulha_2',
        'uts',
        'ulha_3',
        'uas',
    ];
}
