<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rapot
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string $p_nilai
 * @property string $p_predikat
 * @property string $p_deskripsi
 * @property string|null $k_nilai
 * @property string|null $k_predikat
 * @property string|null $k_deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKPredikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePPredikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rapot extends Model
{
    protected $table = 'rapot';

    protected $fillable = ['santri_id', 'kelas_id', 'guru_id', 'mapel_id', 'p_nilai', 'p_predikat', 'p_deskripsi', 'k_nilai', 'k_predikat', 'k_deskripsi'];
}
