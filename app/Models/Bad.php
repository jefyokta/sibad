<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bad extends Model
{
    protected $fillable = [
        "lecturer_id",
        "course_id",
        "semester",
        "status"
    ];

    public function lecturer(): BelongsTo
    {

        return $this->belongsTo(Lecturers::class)->withTrashed();
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class)->withTrashed();
    }
}
