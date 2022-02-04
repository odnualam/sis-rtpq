<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sikap
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $sikap_1
 * @property string|null $sikap_2
 * @property string|null $sikap_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sikap extends Model
{
    protected $table = 'sikap';

    protected $fillable = ['santri_id', 'kelas_id', 'guru_id', 'mapel_id', 'sikap_1', 'sikap_2', 'sikap_3'];
}
