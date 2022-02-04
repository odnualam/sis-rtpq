<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Guru
 *
 * @property int $id
 * @property string $id_card
 * @property string|null $pendidikan
 * @property string $nama_guru
 * @property int $mapel_id
 * @property string|null $kode
 * @property string $jk
 * @property string|null $telp
 * @property string|null $tmp_lahir
 * @property string|null $tgl_lahir
 * @property string $foto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Mapel|null $mapel
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newQuery()
 * @method static \Illuminate\Database\Query\Builder|Guru onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNamaGuru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Guru withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Guru withoutTrashed()
 * @mixin \Eloquent
 */
class Guru extends Model
{
    use SoftDeletes;

    protected $table = 'guru';

    protected $fillable = ['id_card', 'pendidikan', 'nama_guru', 'mapel_id', 'kode', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel')->withDefault();
    }

    public function dsk($id)
    {
        $dsk = Nilai::where('guru_id', $id)->first();

        return $dsk;
    }
}
