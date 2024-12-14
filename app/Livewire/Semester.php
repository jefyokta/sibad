<?php

namespace App\Livewire;

use App\Models\Semester as ModelsSemester;
use Livewire\Component;

class Semester extends Component
{
    public $semesters;
    public $sm = 'null';

    public function mount()
    {
        $this->fetchSemesters();
    }

    public function updatedSm($value)
    {
        $this->fetchSemesters();
    }

    public function fetchSemesters()
    {
        $this->semesters = $this->sm !== 'null'
            ? ModelsSemester::where('is_odd', $this->sm)->get()
            : ModelsSemester::select('*')->get();
    }

    public function update(int $id)
    {
        $semester = ModelsSemester::find($id);

        if (!$semester) {
            return redirect("/report")->with('error', "Semester tidak ditemukan");
        }

        $semester->update(['approved' => 1]);
        return redirect("/report")->with('success', "Berhasil approve semester");
    }

    public function render()
    {
        return view('livewire.semester');
    }
}
