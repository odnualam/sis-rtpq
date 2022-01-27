<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kelas.
 *
 * @property int $id
 * @property string $nama_kelas
 * @property int $paket_id
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Paket|null $paket
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Query\Builder|Kelas onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas wherePaketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Kelas withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Kelas withoutTrashed()
 * @mixin \Eloquent
 */
class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = ['paket_id', 'nama_kelas', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket')->withDefault();
    }
}
