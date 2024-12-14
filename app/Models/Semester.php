<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['begin', 'end', 'is_odd', 'approved'];

    public static function queryForCurrent()
    {
        $today = now()->format('Y-m-d');
        $s = self::where('begin', '<=', $today)
            ->where('end', '>=', $today);
        return $s;
    }

    public static function createSemestersForYear(): void
    {
        $now = now();
        $year = $now->year;

        $oddSemesterBegin = "$year-08-01";
        $oddSemesterEnd = ($year + 1) . "-01-31";

        $evenSemesterBegin = ($year + 1)."-02-01";
        $evenSemesterEnd = ($year + 1)."-07-31";

        if (!self::where('begin', $oddSemesterBegin)->where('end', $oddSemesterEnd)->exists()) {
            self::create([
                'begin' => $oddSemesterBegin,
                'end' => $oddSemesterEnd,
                'is_odd' => true,
            ]);
        }

        if (!self::where('begin', $evenSemesterBegin)->where('end', $evenSemesterEnd)->exists()) {
            self::create([
                'begin' => $evenSemesterBegin,
                'end' => $evenSemesterEnd,
                'is_odd' => false,
            ]);
        }
    }


    public static function current()
    {
        return self::queryForCurrent()->first();
    }

    public static function isCurrentExist(): bool
    {
        return self::queryForCurrent()->exists();
    }

    public static function currentType(): ?string
    {
        $currentSemester = self::current();
        return $currentSemester ? ($currentSemester->is_odd ? 'odd' : 'even') : null;
    }
}
