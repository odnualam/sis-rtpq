<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nilai.
 *
 * @property int $id
 * @property int $guru_id
 * @property int $kkm
 * @property string|null $deskripsi_a
 * @property string|null $deskripsi_b
 * @property string|null $deskripsi_c
 * @property string|null $deskripsi_d
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Guru|null $guru
 * @method static Builder|Nilai newModelQuery()
 * @method static Builder|Nilai newQuery()
 * @method static Builder|Nilai query()
 * @method static Builder|Nilai whereCreatedAt($value)
 * @method static Builder|Nilai whereDeskripsiA($value)
 * @method static Builder|Nilai whereDeskripsiB($value)
 * @method static Builder|Nilai whereDeskripsiC($value)
 * @method static Builder|Nilai whereDeskripsiD($value)
 * @method static Builder|Nilai whereGuruId($value)
 * @method static Builder|Nilai whereId($value)
 * @method static Builder|Nilai whereKkm($value)
 * @method static Builder|Nilai whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'guru_id',
        'kkm',
        'deskripsi_a',
        'deskripsi_b',
        'deskripsi_c',
        'deskripsi_d',
    ];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }
}
