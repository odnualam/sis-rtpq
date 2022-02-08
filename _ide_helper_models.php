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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Santri|null $santri
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereAbsenS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereTahunAjaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absen whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereBatchUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCauserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCauserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereLogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereUpdatedAt($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Guru wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hari newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereNamaHari($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hari whereUpdatedAt($value)
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
	class Jadwal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelas.
 *
 * @property int $id
 * @property string $nama_kelas
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelompok|null $kelompok
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nama
 * @property string $jenis
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelompok whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Kelompok|null $kelompok
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Mapel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereKelompokId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUrutan($value)
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
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Mapel|null $mapel
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $kode
 * @property int $kelas_id
 * @property int|null $jenis_pembayaran
 * @property string|null $bukti_non_tunai
 * @property int|null $santri_id
 * @property int|null $status
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Santri|null $santri
 * @property-read \App\Models\SPP|null $spp
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereBuktiNonTunai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereBulanDibayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereJenisPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereJumlahBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTglBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $kode_pembayaran
 * @property-read \App\Models\Santri|null $santri
 * @method static \Illuminate\Database\Eloquent\Builder|SPP newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SPP newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SPP query()
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereBukti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereKodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $tahun
 * @method static \Illuminate\Database\Eloquent\Builder|SPP whereTahun($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $tahun_ajaran
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Absen[] $absensi
 * @property-read int|null $absensi_count
 * @property-read \App\Models\Kelas|null $kelas
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri query()
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatSantri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAlamatWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereAnakKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaSantri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNamaWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri wherePekerjaanWali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereStatusKeluarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTahunAjaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereTmpLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Santri whereUpdatedAt($value)
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAksesInternet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStatusSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSumberListrik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWaktuPenyelenggaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebsite($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereSikap3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sikap whereUpdatedAt($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereSantriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUlha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ulangan whereUts($value)
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
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $nisn
 * @property string|null $id_card
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

