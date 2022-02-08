<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sikap.
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $sikap_1
 * @property string|null $sikap_2
 * @property string|null $sikap_3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Sikap newModelQuery()
 * @method static Builder|Sikap newQuery()
 * @method static Builder|Sikap query()
 * @method static Builder|Sikap whereCreatedAt($value)
 * @method static Builder|Sikap whereGuruId($value)
 * @method static Builder|Sikap whereId($value)
 * @method static Builder|Sikap whereKelasId($value)
 * @method static Builder|Sikap whereMapelId($value)
 * @method static Builder|Sikap whereSantriId($value)
 * @method static Builder|Sikap whereSikap1($value)
 * @method static Builder|Sikap whereSikap2($value)
 * @method static Builder|Sikap whereSikap3($value)
 * @method static Builder|Sikap whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sikap extends Model
{
    use HasFactory;

    protected $table = 'sikap';

    protected $fillable = [
        'santri_id',
        'kelas_id',
        'guru_id',
        'mapel_id',
        'sikap_1',
        'sikap_2',
        'sikap_3',
    ];
}
