<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Rapot.
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Rapot newModelQuery()
 * @method static Builder|Rapot newQuery()
 * @method static Builder|Rapot query()
 * @method static Builder|Rapot whereCreatedAt($value)
 * @method static Builder|Rapot whereGuruId($value)
 * @method static Builder|Rapot whereId($value)
 * @method static Builder|Rapot whereKDeskripsi($value)
 * @method static Builder|Rapot whereKNilai($value)
 * @method static Builder|Rapot whereKPredikat($value)
 * @method static Builder|Rapot whereKelasId($value)
 * @method static Builder|Rapot whereMapelId($value)
 * @method static Builder|Rapot wherePDeskripsi($value)
 * @method static Builder|Rapot wherePNilai($value)
 * @method static Builder|Rapot wherePPredikat($value)
 * @method static Builder|Rapot whereSantriId($value)
 * @method static Builder|Rapot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rapot extends Model
{
    use HasFactory;

    protected $table = 'rapot';

    protected $fillable = [
        'santri_id',
        'kelas_id',
        'guru_id',
        'mapel_id',
        'p_nilai',
        'p_predikat',
        'p_deskripsi',
        'k_nilai',
        'k_predikat',
        'k_deskripsi',
    ];
}
