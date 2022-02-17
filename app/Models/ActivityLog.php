<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\ActivityLog.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property string|null $event
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property int|null $causer_id
 * @property mixed|null $properties
 * @property string|null $batch_uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read User|null $user
 * @method static Builder|ActivityLog newModelQuery()
 * @method static Builder|ActivityLog newQuery()
 * @method static Builder|ActivityLog query()
 * @method static Builder|ActivityLog whereBatchUuid($value)
 * @method static Builder|ActivityLog whereCauserId($value)
 * @method static Builder|ActivityLog whereCauserType($value)
 * @method static Builder|ActivityLog whereCreatedAt($value)
 * @method static Builder|ActivityLog whereDescription($value)
 * @method static Builder|ActivityLog whereEvent($value)
 * @method static Builder|ActivityLog whereId($value)
 * @method static Builder|ActivityLog whereLogName($value)
 * @method static Builder|ActivityLog whereProperties($value)
 * @method static Builder|ActivityLog whereSubjectId($value)
 * @method static Builder|ActivityLog whereSubjectType($value)
 * @method static Builder|ActivityLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActivityLog extends Model
{
    use LogsActivity, HasFactory;

    protected $table = 'activity_log';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
