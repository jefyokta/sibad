<?php

namespace App\Livewire;

use App\Models\Lecturers;
use App\Models\OtherJob;
use Livewire\Component;

class LecturerCreate extends Component
{
    public $nip, $name, $role, $gol, $otherjob_id;
    public $otherjobs;

    public function mount()
    {
        $this->otherjobs = OtherJob::all();
    }
    public function save()
    {
        $v = (object) $this->validate([
            'nip' => 'required|numeric|unique:lecturers,nip',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            "otherjob_id" => "nullable|numeric"

        ]);
        [$role, $gol] = explode("-", $v->role);
        Lecturers::insert([
            "nip" => $v->nip,
            'name' => $v->name,
            'role' => $role,
            'gol' => $gol,
            "otherjob_id" => $v->otherjob_id
        ]);

        return redirect('lecturers')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.lecturer-create');
    }
}
