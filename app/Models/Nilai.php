<?php

namespace App\Models;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guru|null $guru
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereKkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = ['guru_id', 'kkm', 'deskripsi_a', 'deskripsi_b', 'deskripsi_c', 'deskripsi_d'];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }
}
