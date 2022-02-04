<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Jadwal
 *
 * @property int $id
 * @property int $hari_id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Hari|null $hari
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Mapel|null $mapel
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereHariId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereJamMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereJamSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = ['hari_id', 'kelas_id', 'mapel_id', 'guru_id', 'jam_mulai', 'jam_selesai'];

    public function hari()
    {
        return $this->belongsTo('App\Models\Hari')->withDefault();
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }

    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel')->withDefault();
    }

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function rapot($id)
    {
        $kelas = Kelas::where('id', $id)->first();

        return $kelas;
    }

    public function pengajar($id)
    {
        $guru = Guru::where('id', $id)->first();

        return $guru;
    }

    public function ulangan($id)
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $nilai = Ulangan::where('santri_id', $santri->id)->where('mapel_id', $id)->first();

        return $nilai;
    }

    public function nilai($id)
    {
        $santri = Santri::where('nisn', Auth::user()->nisn)->first();
        $nilai = Rapot::where('santri_id', $santri->id)->where('mapel_id', $id)->first();

        return $nilai;
    }

    public function kkm($id)
    {
        $kkm = Nilai::where('guru_id', $id)->first();

        return $kkm['kkm'];
    }

    public function absen($id)
    {
        $absen = Absen::where('tanggal', date('Y-m-d'))->where('guru_id', $id)->first();
        $ket = Kehadiran::where('id', $absen['kehadiran_id'])->first();

        return $ket['color'];
    }

    public function cekUlangan($id)
    {
        $data = json_decode($id, true);
        $ulangan = Ulangan::where('santri_id', $data['santri'])->where('mapel_id', $data['mapel'])->first();

        return $ulangan;
    }

    public function cekRapot($id)
    {
        $data = json_decode($id, true);
        $rapot = Rapot::where('santri_id', $data['santri'])->where('mapel_id', $data['mapel'])->first();

        return $rapot;
    }
}
