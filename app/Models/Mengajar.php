<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mengajar
 *
 * @property int $id
 * @property int $kelas_id
 * @property int $mapel_id
 * @property int $guru_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Mapel|null $mapel
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mengajar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Mengajar extends Model
{
    use HasFactory;

    public $table = "mengajar";
    public $fillable = ['kelas_id','mapel_id','guru_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
