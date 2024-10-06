<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class InventoryDataSet extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'inventory_data_sets';

    protected $fillable = [
        'client_id',
        'department_id',
        'data_title',
        'inventory_category_id',
        'inventory_data_type_id',
        'data_hold_reason_ids',
        'related_to_id',
        'legal_reason',
        'data_hold_place',
        'data_hold_time',
        'data_transfer_to_id',
        'data_to_abroad',
        'kvkk_precaution_ids',
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
                'client_id',
                'department_id',
                'data_title',
                'inventory_category_id',
                'inventory_data_type_id',
                'data_hold_reason_ids',
                'related_to_id',
                'legal_reason',
                'data_hold_place',
                'data_hold_time',
                'data_transfer_to_id',
                'data_to_abroad',
                'kvkk_precaution_ids',
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

    public function linkedDepartment()
    {
        return $this->belongsTo(CompanyDepartment::class, 'department_id', 'id')->withTrashed();
    }

    public function linkedInventoryCategory()
    {
        return $this->belongsTo(InventoryCategory::class, 'inventory_category_id', 'id')->withTrashed();
    }

    public function linkedInventoryDataType()
    {
        return $this->belongsTo(InventoryDataType::class, 'inventory_data_type_id', 'id')->withTrashed();
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
