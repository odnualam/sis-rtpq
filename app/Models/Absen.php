<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Absen.
 *
 * @property int $id
 * @property string|null $tahun_ajaran
 * @property string|null $semester
 * @property int|null $kelas_id
 * @property int|null $santri_id
 * @property int|null $absen_s
 * @property int|null $absen_i
 * @property int|null $absen_a
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Santri|null $santri
 * @method static Builder|Absen newModelQuery()
 * @method static Builder|Absen newQuery()
 * @method static Builder|Absen query()
 * @method static Builder|Absen whereAbsenA($value)
 * @method static Builder|Absen whereAbsenI($value)
 * @method static Builder|Absen whereAbsenS($value)
 * @method static Builder|Absen whereCreatedAt($value)
 * @method static Builder|Absen whereId($value)
 * @method static Builder|Absen whereKelasId($value)
 * @method static Builder|Absen whereSantriId($value)
 * @method static Builder|Absen whereSemester($value)
 * @method static Builder|Absen whereTahunAjaran($value)
 * @method static Builder|Absen whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Absen extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'kelas_id',
        'santri_id',
        'absen_s',
        'absen_i',
        'absen_a',
    ];

    public function santri()
    {
        return $this->belongsTo('App\Models\Santri')->withDefault();
    }
}
