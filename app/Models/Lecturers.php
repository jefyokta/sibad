<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["name", "nip", "gol", "role", "otherjob_id"];

    public function bads(): HasMany
    {

        return $this->hasMany(Bad::class,'lecturer_id');
    }

    public function otherjob(): BelongsTo
    {
        return $this->belongsTo(OtherJob::class)->withTrashed();
    }

}
