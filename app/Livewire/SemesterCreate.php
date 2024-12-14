<?php

namespace App\Livewire;

use App\Models\Semester;
use Livewire\Component;

class SemesterCreate extends Component
{
    public $year;


    public function save()
    {
        $validated = $this->validate([
            'year' => "required|date_format:Y",
        ]);

        $year = $validated['year'];

        $oddBegin = "$year-08-01";
        $oddEnd = ($year + 1) . "-01-31";

        $evenBegin = ($year + 1) . "-02-01";
        $evenEnd = ($year + 1) . "-07-31";

        if (
            Semester::where('begin', $oddBegin)->where('end', $oddEnd)->exists() ||
            Semester::where('begin', $evenBegin)->where('end', $evenEnd)->exists()
        ) {
            session()->flash('error', 'Semester untuk tahun ini sudah ada!');
            return redirect('/semester/create')->with('error', 'semester tahun tersebut sudah dibuat');
        }

        Semester::insert([
            [
                'begin' => $oddBegin,
                'end' => $oddEnd,
                'is_odd' => true,

            ],
            [
                'begin' => $evenBegin,
                'end' => $evenEnd,
                'is_odd' => false,

            ],
        ]);

        return redirect('/report')->with('success', 'berhasil menambahkan semester ganjil dan genap');
    }

    public function render()
    {
        return view('livewire.semester-create');
    }
}
