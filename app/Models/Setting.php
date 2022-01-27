<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting.
 *
 * @property int $id
 * @property string|null $value
 * @property string|null $nama
 * @property string|null $key
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @mixin \Eloquent
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
 * @property int|null $kelurahan
 * @property int|null $kecamatan
 * @property int|null $kabupaten_kota
 * @property int|null $provinsi
 * @property string|null $jumlah_santri
 * @property string|null $jumlah_guru
 * @property string|null $ruang_kelas
 * @property string|null $logo
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAksesInternet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereJenjangPendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereJumlahGuru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereJumlahSantri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKabupatenKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKelurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKodePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLuasTanah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNamaKepalaSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNamaSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNoTelpon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNpsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereRuangKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStatusSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSumberListrik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWaktuPenyelenggaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebsite($value)
 */
class Setting extends Model
{
    use HasFactory;

    protected $table = 'identitas_sekolah';

    protected $guarded = [];
}
