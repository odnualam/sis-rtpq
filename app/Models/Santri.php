<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Santri.
 *
 * @property int $id
 * @property string $nisn
 * @property string $nama_santri
 * @property string $jk
 * @property string|null $tmp_lahir
 * @property string|null $tgl_lahir
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
 * @property string $foto
 * @property int $kelas_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $tahun_ajaran
 * @property-read Collection|Absen[] $absensi
 * @property-read int|null $absensi_count
 * @property-read Kelas|null $kelas
 * @method static Builder|Santri newModelQuery()
 * @method static Builder|Santri newQuery()
 * @method static Builder|Santri query()
 * @method static Builder|Santri whereAgama($value)
 * @method static Builder|Santri whereAlamatAyah($value)
 * @method static Builder|Santri whereAlamatIbu($value)
 * @method static Builder|Santri whereAlamatSantri($value)
 * @method static Builder|Santri whereAlamatWali($value)
 * @method static Builder|Santri whereAnakKe($value)
 * @method static Builder|Santri whereCreatedAt($value)
 * @method static Builder|Santri whereDeletedAt($value)
 * @method static Builder|Santri whereFoto($value)
 * @method static Builder|Santri whereId($value)
 * @method static Builder|Santri whereJk($value)
 * @method static Builder|Santri whereKelasId($value)
 * @method static Builder|Santri whereNamaAyah($value)
 * @method static Builder|Santri whereNamaIbu($value)
 * @method static Builder|Santri whereNamaSantri($value)
 * @method static Builder|Santri whereNamaWali($value)
 * @method static Builder|Santri whereNisn($value)
 * @method static Builder|Santri wherePekerjaanAyah($value)
 * @method static Builder|Santri wherePekerjaanIbu($value)
 * @method static Builder|Santri wherePekerjaanWali($value)
 * @method static Builder|Santri whereStatusKeluarga($value)
 * @method static Builder|Santri whereTahunAjaran($value)
 * @method static Builder|Santri whereTglLahir($value)
 * @method static Builder|Santri whereTmpLahir($value)
 * @method static Builder|Santri whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Santri extends Model
{
    use HasFactory;

    protected $table = 'santri';

    protected $fillable = [
        'nisn', 'nama_santri',
        'kelas_id',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'foto',
        'agama',
        'anak_ke',
        'status_keluarga',
        'alamat_santri',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_ayah',
        'alamat_ibu',
        'nama_wali',
        'alamat_wali',
        'pekerjaan_wali',
        'tahun_ajaran',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }

    public function ulangan($id, $mapel = null)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Ulangan::where('santri_id', $id)->where('guru_id', $guru->id)->where('mapel_id', $mapel)->first();

        return $nilai;
    }

    public function sikap($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Sikap::where('santri_id', $id)->where('guru_id', $guru->id)->first();

        return $nilai;
    }

    public function nilai($id, $mapel = null)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Rapot::where('santri_id', $id)->where('guru_id', $guru->id)->where('mapel_id', $mapel)->first();

        return $nilai;
    }

    public function absensi()
    {
        return $this->hasMany(Absen::class, 'santri_id');
    }
}
