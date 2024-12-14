<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseAdd extends Component
{

    public $name;
    public $code;
    public $semester;
    public $sks;
    public $class;
    public $studyprogram;

    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:50|unique:courses',
        'semester' => 'nullable|integer|min:0|max:8',
        'sks' => 'required|integer|min:1|max:24',
        'class' => 'required|string|max:50',
        'studyprogram' => 'required|string|max:255',
    ];



    public function save()
    {


        try {
            $v = $this->validate();
            Course::insert($v);
            return redirect('/courses')->with('success',"Berhasil Menambah matakuliah");
        } catch (\Throwable $th) {
            return redirect('/courses')->with('error',$th->getMessage());

        }
    }

    public function render()
    {
        return view('livewire.course-add');
    }
}

