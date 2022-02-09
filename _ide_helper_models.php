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
 * App\Models\Absen.
 *
 * @property int $id
 * @property string|null $tahun_ajaran
 * @property string|null $semester
 * @property int|null $kelas_id
 * @property int|null $santri_id
 * @property int|null $absen_s
 * @property int|null $absen_i
 * @property int|null $absen_a
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Santri|null $santri
 * @method static Builder|Absen newModelQuery()
 * @method static Builder|Absen newQuery()
 * @method static Builder|Absen query()
 * @method static Builder|Absen whereAbsenA($value)
 * @method static Builder|Absen whereAbsenI($value)
 * @method static Builder|Absen whereAbsenS($value)
 * @method static Builder|Absen whereCreatedAt($value)
 * @method static Builder|Absen whereId($value)
 * @method static Builder|Absen whereKelasId($value)
 * @method static Builder|Absen whereSantriId($value)
 * @method static Builder|Absen whereSemester($value)
 * @method static Builder|Absen whereTahunAjaran($value)
 * @method static Builder|Absen whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Absen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ActivityLog.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property string|null $event
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property int|null $causer_id
 * @property mixed|null $properties
 * @property string|null $batch_uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read User|null $user
 * @method static Builder|ActivityLog newModelQuery()
 * @method static Builder|ActivityLog newQuery()
 * @method static Builder|ActivityLog query()
 * @method static Builder|ActivityLog whereBatchUuid($value)
 * @method static Builder|ActivityLog whereCauserId($value)
 * @method static Builder|ActivityLog whereCauserType($value)
 * @method static Builder|ActivityLog whereCreatedAt($value)
 * @method static Builder|ActivityLog whereDescription($value)
 * @method static Builder|ActivityLog whereEvent($value)
 * @method static Builder|ActivityLog whereId($value)
 * @method static Builder|ActivityLog whereLogName($value)
 * @method static Builder|ActivityLog whereProperties($value)
 * @method static Builder|ActivityLog whereSubjectId($value)
 * @method static Builder|ActivityLog whereSubjectType($value)
 * @method static Builder|ActivityLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Guru extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Hari.
 *
 * @property int $id
 * @property string $nama_hari
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Hari newModelQuery()
 * @method static Builder|Hari newQuery()
 * @method static Builder|Hari query()
 * @method static Builder|Hari whereCreatedAt($value)
 * @method static Builder|Hari whereId($value)
 * @method static Builder|Hari whereNamaHari($value)
 * @method static Builder|Hari whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Hari extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Jadwal.
 *
 * @property int $id
 * @property int $hari_id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property-read Guru|null $guru
 * @property-read Hari|null $hari
 * @property-read Kelas|null $kelas
 * @property-read Mapel|null $mapel
 * @method static Builder|Jadwal newModelQuery()
 * @method static Builder|Jadwal newQuery()
 * @method static Builder|Jadwal query()
 * @method static Builder|Jadwal whereCreatedAt($value)
 * @method static Builder|Jadwal whereDeletedAt($value)
 * @method static Builder|Jadwal whereGuruId($value)
 * @method static Builder|Jadwal whereHariId($value)
 * @method static Builder|Jadwal whereId($value)
 * @method static Builder|Jadwal whereJamMulai($value)
 * @method static Builder|Jadwal whereJamSelesai($value)
 * @method static Builder|Jadwal whereKelasId($value)
 * @method static Builder|Jadwal whereMapelId($value)
 * @method static Builder|Jadwal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Jadwal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelas.
 *
 * @property int $id
 * @property string $nama_kelas
 * @property int $guru_id
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property-read Guru|null $guru
 * @property-read Kelompok|null $kelompok
 * @method static Builder|Kelas newModelQuery()
 * @method static Builder|Kelas newQuery()
 * @method static Builder|Kelas query()
 * @method static Builder|Kelas whereCreatedAt($value)
 * @method static Builder|Kelas whereGuruId($value)
 * @method static Builder|Kelas whereId($value)
 * @method static Builder|Kelas whereNamaKelas($value)
 * @method static Builder|Kelas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelompok.
 *
 * @property int $id
 * @property string $ket
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nama
 * @property string $jenis
 * @method static Builder|Kelompok newModelQuery()
 * @method static Builder|Kelompok newQuery()
 * @method static Builder|Kelompok query()
 * @method static Builder|Kelompok whereCreatedAt($value)
 * @method static Builder|Kelompok whereId($value)
 * @method static Builder|Kelompok whereJenis($value)
 * @method static Builder|Kelompok whereKet($value)
 * @method static Builder|Kelompok whereNama($value)
 * @method static Builder|Kelompok whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Kelompok extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mapel.
 *
 * @property int $id
 * @property string $nama_mapel
 * @property int $kelompok_id
 * @property int $urutan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Kelompok|null $kelompok
 * @method static Builder|Mapel newModelQuery()
 * @method static Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static Builder|Mapel query()
 * @method static Builder|Mapel whereCreatedAt($value)
 * @method static Builder|Mapel whereDeletedAt($value)
 * @method static Builder|Mapel whereId($value)
 * @method static Builder|Mapel whereKelompokId($value)
 * @method static Builder|Mapel whereNamaMapel($value)
 * @method static Builder|Mapel whereUpdatedAt($value)
 * @method static Builder|Mapel whereUrutan($value)
 * @method static \Illuminate\Database\Query\Builder|Mapel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Mapel withoutTrashed()
 * @mixin \Eloquent
 */
	class Mapel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mengajar.
 *
 * @property int $id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property-read Guru|null $guru
 * @property-read Kelas|null $kelas
 * @property-read Mapel|null $mapel
 * @method static Builder|Mengajar newModelQuery()
 * @method static Builder|Mengajar newQuery()
 * @method static Builder|Mengajar query()
 * @method static Builder|Mengajar whereCreatedAt($value)
 * @method static Builder|Mengajar whereDeletedAt($value)
 * @method static Builder|Mengajar whereGuruId($value)
 * @method static Builder|Mengajar whereId($value)
 * @method static Builder|Mengajar whereKelasId($value)
 * @method static Builder|Mengajar whereMapelId($value)
 * @method static Builder|Mengajar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Mengajar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Nilai.
 *
 * @property int $id
 * @property int $guru_id
 * @property int $kkm
 * @property string|null $deskripsi_a
 * @property string|null $deskripsi_b
 * @property string|null $deskripsi_c
 * @property string|null $deskripsi_d
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Guru|null $guru
 * @method static Builder|Nilai newModelQuery()
 * @method static Builder|Nilai newQuery()
 * @method static Builder|Nilai query()
 * @method static Builder|Nilai whereCreatedAt($value)
 * @method static Builder|Nilai whereDeskripsiA($value)
 * @method static Builder|Nilai whereDeskripsiB($value)
 * @method static Builder|Nilai whereDeskripsiC($value)
 * @method static Builder|Nilai whereDeskripsiD($value)
 * @method static Builder|Nilai whereGuruId($value)
 * @method static Builder|Nilai whereId($value)
 * @method static Builder|Nilai whereKkm($value)
 * @method static Builder|Nilai whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Nilai extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pembayaran.
 *
 * @property int $id
 * @property string $tgl_bayar
 * @property string $bulan_dibayar
 * @property int $id_spp
 * @property string $jumlah_bayar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $kode
 * @property int $kelas_id
 * @property int|null $jenis_pembayaran
 * @property string|null $bukti_non_tunai
 * @property int|null $santri_id
 * @property int|null $status
 * @property-read Kelas|null $kelas
 * @property-read Santri|null $santri
 * @property-read SPP|null $spp
 * @method static Builder|Pembayaran newModelQuery()
 * @method static Builder|Pembayaran newQuery()
 * @method static Builder|Pembayaran query()
 * @method static Builder|Pembayaran whereBuktiNonTunai($value)
 * @method static Builder|Pembayaran whereBulanDibayar($value)
 * @method static Builder|Pembayaran whereCreatedAt($value)
 * @method static Builder|Pembayaran whereId($value)
 * @method static Builder|Pembayaran whereIdSpp($value)
 * @method static Builder|Pembayaran whereJenisPembayaran($value)
 * @method static Builder|Pembayaran whereJumlahBayar($value)
 * @method static Builder|Pembayaran whereKelasId($value)
 * @method static Builder|Pembayaran whereKode($value)
 * @method static Builder|Pembayaran whereSantriId($value)
 * @method static Builder|Pembayaran whereStatus($value)
 * @method static Builder|Pembayaran whereTglBayar($value)
 * @method static Builder|Pembayaran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengumuman.
 *
 * @property int $id
 * @property string $opsi
 * @property string $isi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Pengumuman newModelQuery()
 * @method static Builder|Pengumuman newQuery()
 * @method static Builder|Pengumuman query()
 * @method static Builder|Pengumuman whereCreatedAt($value)
 * @method static Builder|Pengumuman whereId($value)
 * @method static Builder|Pengumuman whereIsi($value)
 * @method static Builder|Pengumuman whereOpsi($value)
 * @method static Builder|Pengumuman whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Pengumuman extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rapot.
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string $p_nilai
 * @property string $p_predikat
 * @property string $p_deskripsi
 * @property string|null $k_nilai
 * @property string|null $k_predikat
 * @property string|null $k_deskripsi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Rapot newModelQuery()
 * @method static Builder|Rapot newQuery()
 * @method static Builder|Rapot query()
 * @method static Builder|Rapot whereCreatedAt($value)
 * @method static Builder|Rapot whereGuruId($value)
 * @method static Builder|Rapot whereId($value)
 * @method static Builder|Rapot whereKDeskripsi($value)
 * @method static Builder|Rapot whereKNilai($value)
 * @method static Builder|Rapot whereKPredikat($value)
 * @method static Builder|Rapot whereKelasId($value)
 * @method static Builder|Rapot whereMapelId($value)
 * @method static Builder|Rapot wherePDeskripsi($value)
 * @method static Builder|Rapot wherePNilai($value)
 * @method static Builder|Rapot wherePPredikat($value)
 * @method static Builder|Rapot whereSantriId($value)
 * @method static Builder|Rapot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Rapot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SPP.
 *
 * @property int $id
 * @property int|null $santri_id
 * @property int|null $status
 * @property int|null $type
 * @property string|null $nominal
 * @property string|null $bukti
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $kode_pembayaran
 * @property-read Santri|null $santri
 * @method static Builder|SPP newModelQuery()
 * @method static Builder|SPP newQuery()
 * @method static Builder|SPP query()
 * @method static Builder|SPP whereBukti($value)
 * @method static Builder|SPP whereCreatedAt($value)
 * @method static Builder|SPP whereId($value)
 * @method static Builder|SPP whereKodePembayaran($value)
 * @method static Builder|SPP whereNominal($value)
 * @method static Builder|SPP whereSantriId($value)
 * @method static Builder|SPP whereStatus($value)
 * @method static Builder|SPP whereType($value)
 * @method static Builder|SPP whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $tahun
 * @method static Builder|SPP whereTahun($value)
 */
	class SPP extends \Eloquent {}
}

namespace App\Models{
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
	class Santri extends \Eloquent {}
}

namespace App\Models{
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
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sikap.
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $sikap_1
 * @property string|null $sikap_2
 * @property string|null $sikap_3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Sikap newModelQuery()
 * @method static Builder|Sikap newQuery()
 * @method static Builder|Sikap query()
 * @method static Builder|Sikap whereCreatedAt($value)
 * @method static Builder|Sikap whereGuruId($value)
 * @method static Builder|Sikap whereId($value)
 * @method static Builder|Sikap whereKelasId($value)
 * @method static Builder|Sikap whereMapelId($value)
 * @method static Builder|Sikap whereSantriId($value)
 * @method static Builder|Sikap whereSikap1($value)
 * @method static Builder|Sikap whereSikap2($value)
 * @method static Builder|Sikap whereSikap3($value)
 * @method static Builder|Sikap whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Sikap extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ulangan.
 *
 * @property int $id
 * @property int $santri_id
 * @property int $kelas_id
 * @property int $guru_id
 * @property int $mapel_id
 * @property string|null $ulha_1
 * @property string|null $ulha_2
 * @property string|null $uts
 * @property string|null $ulha_3
 * @property string|null $uas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Ulangan newModelQuery()
 * @method static Builder|Ulangan newQuery()
 * @method static Builder|Ulangan query()
 * @method static Builder|Ulangan whereCreatedAt($value)
 * @method static Builder|Ulangan whereGuruId($value)
 * @method static Builder|Ulangan whereId($value)
 * @method static Builder|Ulangan whereKelasId($value)
 * @method static Builder|Ulangan whereMapelId($value)
 * @method static Builder|Ulangan whereSantriId($value)
 * @method static Builder|Ulangan whereUas($value)
 * @method static Builder|Ulangan whereUlha1($value)
 * @method static Builder|Ulangan whereUlha2($value)
 * @method static Builder|Ulangan whereUlha3($value)
 * @method static Builder|Ulangan whereUpdatedAt($value)
 * @method static Builder|Ulangan whereUts($value)
 * @mixin \Eloquent
 */
	class Ulangan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $nisn
 * @property string|null $id_card
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIdCard($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNisn($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRole($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

