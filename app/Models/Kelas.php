<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Kelas.
 *
 * @property int $id
 * @property string $nama_kelas
 * @property int $guru_id
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property-read Guru|null $guru
 * @property-read Kelompok|null $kelompok
 * @method static Builder|Kelas newModelQuery()
 * @method static Builder|Kelas newQuery()
 * @method static Builder|Kelas query()
 * @method static Builder|Kelas whereCreatedAt($value)
 * @method static Builder|Kelas whereGuruId($value)
 * @method static Builder|Kelas whereId($value)
 * @method static Builder|Kelas whereNamaKelas($value)
 * @method static Builder|Kelas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelompok_id',
        'nama_kelas',
        'guru_id',
    ];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function kelompok()
    {
        return $this->belongsTo('App\Models\Kelompok')->withDefault();
    }
}
