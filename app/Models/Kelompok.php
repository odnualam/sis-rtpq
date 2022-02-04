<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kelompok
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
class Kelompok extends Model
{
    protected $table = 'kelompok';

    protected $fillable = ['jenis', 'nama'];
}
