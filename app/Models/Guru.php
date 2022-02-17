<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Guru.
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Mapel|null $mapel
 * @method static Builder|Guru newModelQuery()
 * @method static Builder|Guru newQuery()
 * @method static \Illuminate\Database\Query\Builder|Guru onlyTrashed()
 * @method static Builder|Guru query()
 * @method static Builder|Guru whereCreatedAt($value)
 * @method static Builder|Guru whereDeletedAt($value)
 * @method static Builder|Guru whereFoto($value)
 * @method static Builder|Guru whereId($value)
 * @method static Builder|Guru whereIdCard($value)
 * @method static Builder|Guru whereJk($value)
 * @method static Builder|Guru whereKode($value)
 * @method static Builder|Guru whereMapelId($value)
 * @method static Builder|Guru whereNamaGuru($value)
 * @method static Builder|Guru wherePendidikan($value)
 * @method static Builder|Guru whereTelp($value)
 * @method static Builder|Guru whereTglLahir($value)
 * @method static Builder|Guru whereTmpLahir($value)
 * @method static Builder|Guru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Guru withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Guru withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $nik
 * @method static Builder|Guru whereNik($value)
 */
class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'id_card',
        'pendidikan',
        'nama_guru',
        'jk',
        'telp',
        'tmp_lahir',
        'tgl_lahir',
        'foto',
        'nik',
    ];

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
