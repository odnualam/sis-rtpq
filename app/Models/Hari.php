<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Hari extends Model
{
    protected $table = 'hari';

    protected $fillable = ['nama_hari'];
}
