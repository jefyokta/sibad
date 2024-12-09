<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OtherJob;
use App\Models\Lecturers;

class LecturerEdit extends Component
{
    public $nip, $name, $role, $gol, $id, $otherjob_id;
    public $otherjobs;

    public function mount(Lecturers $lecturer)
    {
        $this->id = $lecturer->id;
        $this->nip = $lecturer->nip;
        $this->name = $lecturer->name;
        $this->role = $lecturer->role."-".$lecturer->gol;
        $this->otherjob_id = $lecturer->otherjob_id;
        $this->otherjobs = OtherJob::all();
    }

    public function save()
    {
        $v = (object) $this->validate([
            "id" => "required",
            'nip' => 'required|numeric|unique:lecturers,nip,' . $this->nip . ',nip',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            "otherjob_id" => "nullable|numeric"
        ]);
        $lecturer = Lecturers::find($v->id);

        [$role, $gol] = explode('-',$v->role);
        $lecturer->update([
            "nip" => $v->nip,
            'name' => $v->name,
            'role' => $role,
            'gol' => $gol,
            "otherjob_id" => $v->otherjob_id
        ]);

        return redirect('/lecturers')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.lecturer-edit');
    }
}
