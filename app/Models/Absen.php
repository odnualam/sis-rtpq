<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Absen.
 *
 * @property int $id
 * @property string $tanggal
 * @property int $guru_id
 * @property int $kehadiran_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kehadiran|null $kehadiran
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereKehadiranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $tahun_ajaran
 * @property int|null $semester
 * @property int|null $kelas_id
 * @property int|null $siswa_id
 * @property int|null $absen_s
 * @property int|null $absen_i
 * @property int|null $absen_a
 * @property-read \App\Models\Santri|null $santri
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereTahunAjaran($value)
 */
class Absen extends Model
{
    protected $table = 'absensi';

    protected $fillable = ['tahun_ajaran', 'semester', 'kelas_id', 'siswa_id', 'absen_s', 'absen_i', 'absen_a'];

    public function santri()
    {
        return $this->belongsTo('App\Models\Santri')->withDefault();
    }
}
