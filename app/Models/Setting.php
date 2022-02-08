<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting.
 *
 * @property string|null $npsn
 * @property string|null $nama_sekolah
 * @property string|null $nama_kepala_sekolah
 * @property string|null $email
 * @property string|null $no_telpon
 * @property string|null $website
 * @property string|null $status_sekolah
 * @property string|null $jenjang_pendidikan
 * @property string|null $waktu_penyelenggaraan
 * @property string|null $luas_tanah
 * @property string|null $akses_internet
 * @property string|null $sumber_listrik
 * @property string|null $alamat
 * @property int|null $kode_pos
 * @property string|null $kelurahan
 * @property string|null $kecamatan
 * @property string|null $kabupaten_kota
 * @property string|null $provinsi
 * @property string|null $jumlah_santri
 * @property string|null $jumlah_guru
 * @property int|null $id
 * @property string|null $logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereAksesInternet($value)
 * @method static Builder|Setting whereAlamat($value)
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereEmail($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereJenjangPendidikan($value)
 * @method static Builder|Setting whereJumlahGuru($value)
 * @method static Builder|Setting whereJumlahSantri($value)
 * @method static Builder|Setting whereKabupatenKota($value)
 * @method static Builder|Setting whereKecamatan($value)
 * @method static Builder|Setting whereKelurahan($value)
 * @method static Builder|Setting whereKodePos($value)
 * @method static Builder|Setting whereLogo($value)
 * @method static Builder|Setting whereLuasTanah($value)
 * @method static Builder|Setting whereNamaKepalaSekolah($value)
 * @method static Builder|Setting whereNamaSekolah($value)
 * @method static Builder|Setting whereNoTelpon($value)
 * @method static Builder|Setting whereNpsn($value)
 * @method static Builder|Setting whereProvinsi($value)
 * @method static Builder|Setting whereStatusSekolah($value)
 * @method static Builder|Setting whereSumberListrik($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereWaktuPenyelenggaraan($value)
 * @method static Builder|Setting whereWebsite($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;

    protected $table = 'identitas_sekolah';

    protected $guarded = [];
}
