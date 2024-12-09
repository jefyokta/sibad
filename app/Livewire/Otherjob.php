<?php

namespace App\Livewire;

use App\Models\OtherJob as M;
use Livewire\Component;

class Otherjob extends Component
{
    public $name, $sks, $otherjobId;
    public bool $isEdit = false;

    public function mount(?int $id = null)
    {
        if ($id) {
            $otherJob = M::find($id);
            $this->otherjobId = $otherJob->id;
            $this->name = $otherJob->name;
            $this->sks = $otherJob->sks;
            $this->isEdit = true;
        }
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'sks' => 'required|numeric|min:0',
        ]);

        if ($this->isEdit && $this->otherjobId) {
            $otherJob = M::findOrFail($this->otherjobId);
            $otherJob->update($validatedData);

            return redirect("/otherjob")->with('success', 'Data berhasil diperbarui!');
        } else {
            M::create($validatedData);
            redirect("/otherjob")->with('success', 'Data berhasil ditambahkan!');
        }
    }

    public function render()
    {
        return view('livewire.otherjob');
    }
}
