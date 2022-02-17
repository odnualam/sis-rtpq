<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Hari.
 *
 * @property int $id
 * @property string $nama_hari
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Hari newModelQuery()
 * @method static Builder|Hari newQuery()
 * @method static Builder|Hari query()
 * @method static Builder|Hari whereCreatedAt($value)
 * @method static Builder|Hari whereId($value)
 * @method static Builder|Hari whereNamaHari($value)
 * @method static Builder|Hari whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hari extends Model
{
    use HasFactory;

    protected $table = 'hari';

    protected $fillable = [
        'nama_hari',
    ];
}
