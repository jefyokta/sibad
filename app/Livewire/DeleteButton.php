<?php

namespace App\Livewire;

use App\Models\Bad;
use App\Models\Course;
use App\Models\Lecturers;
use Livewire\Component;

class DeleteButton extends Component
{
    public $id;
    public $model;
    public $modelName;
    public array $models = [
        'course' => Course::class,
        'lecturer' => Lecturers::class,
        'bad'=> Bad::class,
        'otherjob'=>Otherjob::class,
    ];



    public function mount(int $id,$model){
        $this->id = $id;
        $this->modelName = $model;

    }

    public function delete($data)
    {
        list($id,$model) = $data;

        $this->id = $id;
        $this->model = $this->models[$model];
        $item = $this->model::find($this->id);

        if (!$item) {
            $this->dispatch('swal:error', ['message' => 'Item not found!']);
            return;
        }

        $item->delete();

        $this->dispatch('swal:success', ['message' => 'Data deleted successfully!']);
    }

    public function confirmDelete()
    {
        $this->dispatch('swal:confirmDelete', $this->id, $this->modelName);
    }

    public function render()
    {
        return view('livewire.delete-button');
    }
}
