<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Absen
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
 */
	class Absen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Guru
 *
 * @property int $id
 * @property string $id_card
 * @property string|null $nip
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
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Guru withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Guru withoutTrashed()
 */
	class Guru extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Hari
 *
 * @property int $id
 * @property string $nama_hari
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hari newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereNamaHari($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereUpdatedAt($value)
 */
	class Hari extends \Eloquent {}
}

namespace App\Models{
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Hari|null $hari
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Mapel|null $mapel
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newQuery()
 * @method static \Illuminate\Database\Query\Builder|Jadwal onlyTrashed()
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
 * @method static \Illuminate\Database\Query\Builder|Jadwal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Jadwal withoutTrashed()
 */
	class Jadwal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kehadiran
 *
 * @property int $id
 * @property string $ket
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kehadiran whereUpdatedAt($value)
 */
	class Kehadiran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelas
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
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mapel
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $paket_id
 * @property int $urutan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Paket|null $paket
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel wherePaketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUrutan($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 */
	class Mapel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Nilai
 *
 * @property int $id
 * @property int $guru_id
 * @property int $kkm
 * @property string|null $deskripsi_a
 * @property string|null $deskripsi_b
 * @property string|null $deskripsi_c
 * @property string|null $deskripsi_d
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guru|null $guru
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereDeskripsiD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereKkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereUpdatedAt($value)
 */
	class Nilai extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Paket
 *
 * @property int $id
 * @property string $ket
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Paket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereUpdatedAt($value)
 */
	class Paket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengumuman
 *
 * @property int $id
 * @property string $opsi
 * @property string $isi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereOpsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereUpdatedAt($value)
 */
	class Pengumuman extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rapot
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string $p_nilai
 * @property string $p_predikat
 * @property string $p_deskripsi
 * @property string|null $k_nilai
 * @property string|null $k_predikat
 * @property string|null $k_deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKPredikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot wherePPredikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereUpdatedAt($value)
 */
	class Rapot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Santri
 *
 * @property-read \App\Models\Kelas|null $kelas
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newQuery()
 * @method static \Illuminate\Database\Query\Builder|Santri onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri query()
 * @method static \Illuminate\Database\Query\Builder|Santri withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Santri withoutTrashed()
 */
	class Santri extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
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
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sikap
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $sikap_1
 * @property string|null $sikap_2
 * @property string|null $sikap_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereUpdatedAt($value)
 */
	class Sikap extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ulangan
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $ulha_1
 * @property string|null $ulha_2
 * @property string|null $uts
 * @property string|null $ulha_3
 * @property string|null $uas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUts($value)
 */
	class Ulangan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $nisn
 * @property string|null $id_card
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNISN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}
