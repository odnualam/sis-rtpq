<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SPP
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
 */
class SPP extends Model
{
    use HasFactory;

    protected $table = 'spp';

    protected $fillable = ['santri_id', 'bukti', 'status', 'type', 'nominal', 'kode_pembayaran'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
