<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        "name",
        "sks",
        "class",
        "studyprogram",
        "semester",
        "code"
    ];
}
