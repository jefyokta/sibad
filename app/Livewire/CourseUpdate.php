<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseUpdate extends Component
{
    public $course_id;
    public $course_name;
    public $course_code;
    public $semester;
    public $sks;
    public $class;
    public $studyprogram;

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
        $this->course_name = $course->name;
        $this->course_code = $course->code;
        $this->semester = $course->semester;
        $this->sks = $course->sks;
        $this->class = $course->class;
        $this->studyprogram = $course->studyprogram;
    }

    public function save()
    {


        $v = (object) $this->validate([
            "course_id" => "required",
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:50|unique:courses,course_code,' . $this->course_id,
            'semester' => 'nullable|integer|min:0|max:8',
            'sks' => 'required|integer|min:1|max:24',
            'class' => 'required|string|max:50',
            'studyprogram' => 'required|string|max:255',
        ]);
        try {
            $course = Course::find($v->course_id);
            $course->name = $v->course_name;
            $course->code = $v->course_code;
            $course->semester = $v->semester;
            $course->sks = $v->sks;
            $course->class = $v->class;
            $course->studyprogram = $v->studyprogram;

            $course->save();

            return redirect('/courses')->with('success', "Berhasil ubah data matakuliah");
        } catch (\Throwable $th) {
            // dd($th);
            return redirect('/courses')->with('error', "Gagal ubah data matakuliah");
        }
    }

    public function render()
    {
        return view('livewire.course-update');
    }
}
