<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'opsi',
        'isi',
    ];
}
