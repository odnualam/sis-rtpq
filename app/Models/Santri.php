<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Santri.
 *
 * @property-read \App\Models\Kelas|null $kelas
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newQuery()
 * @method static \Illuminate\Database\Query\Builder|Santri onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri query()
 * @method static \Illuminate\Database\Query\Builder|Santri withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Santri withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $no_induk
 * @property string|null $nis
 * @property string $nama_santri
 * @property string $jk
 * @property string|null $telp
 * @property string|null $tmp_lahir
 * @property string|null $tgl_lahir
 * @property string $foto
 * @property int $kelas_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaSantri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNoInduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereUpdatedAt($value)
 */
class Santri extends Model
{
    use SoftDeletes;

    protected $table = 'santri';

    protected $fillable = ['no_induk', 'nis', 'nama_santri', 'kelas_id', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Ulangan::where('santri_id', $id)->where('guru_id', $guru->id)->first();

        return $nilai;
    }

    public function sikap($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Sikap::where('santri_id', $id)->where('guru_id', $guru->id)->first();

        return $nilai;
    }

    public function nilai($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Rapot::where('santri_id', $id)->where('guru_id', $guru->id)->first();

        return $nilai;
    }

    public function spp()
    {

    }
}
