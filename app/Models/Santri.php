<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
 * @property string $nisn
 * @property string $nama_santri
 * @property string $jk
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
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNISN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereUpdatedAt($value)
 * @property string|null $agama
 * @property string|null $anak_ke
 * @property string|null $status_keluarga
 * @property string|null $alamat_santri
 * @property string|null $nama_ayah
 * @property string|null $nama_ibu
 * @property string|null $pekerjaan_ayah
 * @property string|null $pekerjaan_ibu
 * @property string|null $alamat_ayah
 * @property string|null $alamat_ibu
 * @property string|null $nama_wali
 * @property string|null $alamat_wali
 * @property string|null $pekerjaan_wali
 * @property string|null $tahun_ajaran
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatSantri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAnakKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereStatusKeluarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTahunAjaran($value)
 */
class Santri extends Model
{
    protected $table = 'santri';

    protected $fillable = ['nisn', 'nama_santri', 'kelas_id', 'jk', 'tmp_lahir', 'tgl_lahir', 'foto', 'agama', 'anak_ke', 'status_keluarga', 'alamat_santri', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'alamat_ayah', 'alamat_ibu', 'nama_wali', 'alamat_wali', 'pekerjaan_wali', 'tahun_ajaran'];

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
