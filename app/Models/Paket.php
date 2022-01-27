<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Paket.
 *
 * @property int $id
 * @property string $ket
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Paket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = ['ket'];
}
