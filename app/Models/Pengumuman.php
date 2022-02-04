<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pengumuman
 *
 * @property int $id
 * @property string $opsi
 * @property string $isi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereOpsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengumuman whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = ['opsi', 'isi'];
}
