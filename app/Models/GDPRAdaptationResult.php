<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class GDPRAdaptationResult extends Model
{
    use HasFactory;
    protected $table = 'gdpr_adaptation_results';

    protected $fillable = [
        'exam_id',
        'question_answers',
        'result_points',
    ];
}
