<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class InventoryDataType extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'inventory_data_types';

    protected $fillable = [
        'name',
        'is_data_special',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->properties = $activity->properties->put('Causer Name', $activity->causer->getUserFullName());
        $activity->properties = $activity->properties->put('Log Type', $eventName);
        $activity->properties = $activity->properties->put('Log Subject', $activity->subject_type);
    }

    // Activity Logs
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'is_data_special',
                'is_active',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // Model Connections
    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withTrashed();
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id')->withTrashed();
    }

    public function deletedUser()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }
}
