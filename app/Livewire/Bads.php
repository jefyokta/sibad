<?php

namespace App\Livewire;

use App\Models\Bad;
use Livewire\Component;

class Bads extends Component
{
    public $bads;
    public $semester;
    public function mount($bads,$semester) {
        $this->bads =$bads;
        $this->semester = $semester;
    }
    public function delete(int $id)
    {

        Bad::find($id)->delete();
        return redirect("/bad")->with('success', "Berhasil Mengapus BAD");
    }
    public function render()
    {
        return view('livewire.bads');
    }
}
