<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Lecturers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(): View
    {
        $page = 5;

        return view("pages.course", compact("page"));
    }

    public function courses(Request $request): View
    {
        $page = 3;
        $course = Course::select("*");
        $semester = false;
        if ($request->query('c', false)) {
            $semester = Semester::current();
            $odd = $semester->is_odd ?? false;


            if ($odd) {
                $course = $course->where(function ($query) {
                    $query->whereRaw('semester % 2 = 1')
                        ->orWhere('semester', 0);
                });
            } else {
                $course = $course->where(function ($query) {
                    $query->whereRaw('semester % 2 = 0')
                        ->orWhere('semester', 0);
                });
            }
        }

        $courses = $course->paginate(20);
        return view("pages.course.courses", compact('courses', "page","semester"));
    }

    public function store(Request $request) {}


    public function edit(Course $course)
    {
        $page = 3;

        return view("pages.course.edit", compact("course", 'page'));
    }

    public function add()
    {
        $page = 3;

        return view("pages.course.add", compact('page'));
    }

    public function destroy() {}
}
