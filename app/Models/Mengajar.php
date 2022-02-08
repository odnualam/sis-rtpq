<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mengajar.
 *
 * @property int $id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property-read Guru|null $guru
 * @property-read Kelas|null $kelas
 * @property-read Mapel|null $mapel
 * @method static Builder|Mengajar newModelQuery()
 * @method static Builder|Mengajar newQuery()
 * @method static Builder|Mengajar query()
 * @method static Builder|Mengajar whereCreatedAt($value)
 * @method static Builder|Mengajar whereDeletedAt($value)
 * @method static Builder|Mengajar whereGuruId($value)
 * @method static Builder|Mengajar whereId($value)
 * @method static Builder|Mengajar whereKelasId($value)
 * @method static Builder|Mengajar whereMapelId($value)
 * @method static Builder|Mengajar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Mengajar extends Model
{
    use HasFactory;

    public $table = 'mengajar';

    public $fillable = [
        'kelas_id',
        'mapel_id',
        'guru_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
