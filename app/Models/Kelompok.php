<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';

    protected $fillable = [
        'jenis',
        'nama',
    ];
}
