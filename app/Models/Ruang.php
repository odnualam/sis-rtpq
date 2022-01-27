<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ruang.
 *
 * @property int $id
 * @property string $nama_ruang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereNamaRuang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ruang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ruang extends Model
{
    protected $table = 'ruang';

    protected $fillable = ['nama_ruang'];
}
