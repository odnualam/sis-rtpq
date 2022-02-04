<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kelas
 *
 * @property int $id
 * @property string $nama_kelas
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelompok|null $kelompok
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = ['kelompok_id', 'nama_kelas', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function kelompok()
    {
        return $this->belongsTo('App\Models\Kelompok')->withDefault();
    }
}
