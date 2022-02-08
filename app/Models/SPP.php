<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class SPP extends Model
{
    use HasFactory;

    protected $table = 'spp';

    protected $fillable = [
        'tahun',
        'nominal',
    ];
}
