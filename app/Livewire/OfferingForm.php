<?php

namespace App\Livewire;

use App\Models\Bad;
use App\Models\Course;
use App\Models\Lecturers;
use App\Models\Semester;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class OfferingForm extends Component
{
    public $course = '';
    public $lecturerid = '';



    public function mount()
    {

        $c = request()->query('c') ?? false;
        if ($c) {
            $course =  Course::where('id', $c);
            $taken = $this->getCurrentCourse($course)->count() == 0;
            // dd($taken);
            if (!$taken) {
                $this->course = $c;
            } else {
                return redirect("/course-offering")->with('error', "matakuliah sudah diambil atau berada di jenis semester berbeda!");
            }
        }
    }

    private function getCurrentCourse(Builder $c = null)
    {
        $smt = Semester::current();
        $odd = $smt->is_odd ?? false;
        $courses = $c ?? Course::select("*");

        if ($odd) {
            $courses = $courses->where(function ($query) {
                $query->whereRaw('semester % 2 = 1')
                    ->orWhere('semester', 0);
            })->whereNotIn('id', function ($query) use ($smt) {
                $query->select('course_id')->from('bads')->where('semester_id', $smt->id);
            });
        } else {
            $courses = $courses->where(function ($query) {
                $query->whereRaw('semester % 2 = 0')
                    ->orWhere('semester', 0);
            })->whereNotIn('id', function ($query) use ($smt) {
                $query->select('course_id')->from('bads')->where('semester_id', $smt->id);
            });
        }

        return $courses;
    }
    public function save()
    {
        if (!$this->course || !$this->lecturerid) {
            return redirect("/course-offering")->with('error', "Mohon isi dengan benar");
        }
        $isTaked =  Bad::select("*")->where("course_id", $this->course)->where('semester_id', Semester::current()->id)->count();
        if ($isTaked > 0) {
            return redirect("/course-offering")->with('error', "Mata Kuliah kelas ini sudah diambil");
        }
        Bad::insert([
            "course_id" => $this->course,
            "lecturer_id" => $this->lecturerid,
            "semester_id" => Semester::current()->id
        ]);

        return redirect("/course-offering")->with("success", "berhasil menambahkan BAD");
    }
    public function render()
    {
        $currentcourse = false;
        $lecturer = false;
        if (strlen($this->course) > 0) {
            $currentcourse = Course::find($this->course);
        }

        if (strlen($this->lecturerid) > 0) {
            $lecturer = Lecturers::find($this->lecturerid);
        }
        $lecturers = Lecturers::all();


        $courses = $this->getCurrentCourse()->get();

        return view('livewire.offering-form', compact("courses", "lecturers", "currentcourse", "lecturer"));
    }
}
