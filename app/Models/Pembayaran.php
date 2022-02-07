<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
    	'santri_id','kelas_id','id_spp','bulan_dibayar','jenis_pembayaran','bukti_non_tunai','jumlah_bayar', 'kode', 'tgl_bayar', 'status'
    ];

    public function santri() {
        return $this->hasOne(Santri::class, 'id', 'santri_id');
    }

    public function spp() {
        return $this->hasOne(SPP::class, 'id', 'id_spp');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas')->withDefault();
    }
}
