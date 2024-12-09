<?php

namespace App\Livewire;

use App\Models\Semester as ModelsSemester;
use Livewire\Component;

class Semester extends Component
{
    public $semesters;
    public function mount()
    {

        $this->semesters = ModelsSemester::all();
    }

    public function update(int $id)
    {
        ModelsSemester::findOrFail($id)->update(['approved' => 1]);
        return redirect("/report")->with('success', "Berhasil approve semester");
    }
    public function render()
    {
        return view('livewire.semester');
    }
}
