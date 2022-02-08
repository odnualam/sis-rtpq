<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'santri_id',
        'kelas_id',
        'id_spp',
        'bulan_dibayar',
        'jenis_pembayaran',
        'bukti_non_tunai',
        'jumlah_bayar',
        'kode',
        'tgl_bayar',
        'status',
    ];

    public function santri()
    {
        return $this->hasOne(Santri::class, 'id', 'santri_id');
    }

    public function spp()
    {
        return $this->hasOne(SPP::class, 'id', 'id_spp');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }
}
