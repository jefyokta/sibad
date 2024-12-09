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
        // ->where('approved', true);
        // dd($s);
        return $s;
    }

    public static function createNewSemester(): void
    {
        $now = now();
        $isOdd = $now->month < 2 || $now->month > 7;
        if ($isOdd) {
            $begin = $now->month >= 8
                ? $now->year . '-08-01'
                : $now->subYear()->year . '-08-01';

            $end = $now->month >= 8
                ? $now->addYear()->year . '-01-31'
                : $now->year . '-01-31';
        } else {
            $begin = $now->year . '-02-01';
            $end = $now->year . '-07-31';
        }

        if (self::where('begin', $begin)->where('end', $end)->exists()) {
            throw new Exception('Semester already exists!');
        }

        self::create([
            'begin' => $begin,
            'end' => $end,
            'is_odd' => $isOdd,
        ]);
    }

    public static function current()
    {
        return self::queryForCurrent()->first();
    }

    public static function isCurrentExist(): bool
    {
        // dd(self::queryForCurrent()->exists());
        return self::queryForCurrent()->exists();
    }

    public static function currentType(): ?string
    {
        $currentSemester = self::current();
        return $currentSemester ? ($currentSemester->is_odd ? 'odd' : 'even') : null;
    }
}
