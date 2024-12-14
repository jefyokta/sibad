<?php

use App\Models\Course;
use App\Models\Semester;
use App\Models\Lecturers;
use Illuminate\View\View;
use App\Http\Middleware\Secretary;
use Illuminate\Support\Facades\Route;
use App\Models\Course as ModelsCourse;
use App\Http\Controllers\BadController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\HeadOfStudyProgram;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\OtherJobController;
use App\Http\Controllers\SemesterController;


Route::middleware("auth")->group(function () {
    Route::get("/dashboard", function () {
        $lecturers = Lecturers::count();
        $courses = ModelsCourse::count();
        $odd = Semester::current()->is_odd ?? false;

        $courseLeft = Course::select("*");

        if ($odd) {
            $courseLeft = $courseLeft->where(function ($query) {
                $query->whereRaw('semester % 2 = 1')
                    ->orWhere('semester', 0);
            });
        } else {
            $courseLeft = $courseLeft->where(function ($query) {
                $query->whereRaw('semester % 2 = 0')
                    ->orWhere('semester', 0);
            });
        }
        $currentSemesterCourseCount = $courseLeft->count();

        $courseLeftCount = $courseLeft->whereNotIn('id', function ($query) {
            $query->select('course_id')->from('bads')->where('semester_id', Semester::current()->id);
        })->count();
        $courseLeft = $courseLeft->get();
        $page = 1;
        return view("pages.dashboard", compact("lecturers", "courses", "page", "courseLeft", "courseLeftCount", "currentSemesterCourseCount"));
    })->name("dashboard");
    Route::delete("/logout", [Authentication::class, "logout"])->name("logout");

    // Route::middleware(Secretary::class)->group(function () {
    Route::get("/course-offering", [CourseController::class, "index"]);
    Route::get("/bad", [BadController::class, 'index']);
    Route::get("/courses", [CourseController::class, 'courses']);
    Route::get("/course/edit/{course}", [CourseController::class, 'edit']);
    Route::get("/course/add", [CourseController::class, 'add']);
    // });

    Route::middleware(HeadOfStudyProgram::class)->group(function () {
        Route::put('bad/{bad}', [BadController::class, 'update']);
    });
    Route::get("/otherjob", [OtherJobController::class, 'index']);
    Route::get("/otherjob/create", [OtherJobController::class, 'create']);
    Route::get("/otherjob/edit/{other_job}", [OtherJobController::class, 'edit']);
    Route::get("/lecturers", [LecturerController::class, 'index']);
    Route::get("/lecturer/edit/{lecturer}", [LecturerController::class, 'edit']);
    Route::get("/lecturer/create", [LecturerController::class, 'create']);
    Route::get("/report", [SemesterController::class, 'index']);
    Route::get('/export/{semester}', [SemesterController::class, 'export']);

    Route::get("/semester/create", [SemesterController::class,'create']);
});


Route::middleware("guest")->group(function () {
    Route::get("/login", function (): View {
        return view("login");
    })->name("login");
    Route::get("/", function () {
        // dd(User::all());

        return view("login");
    });
    Route::post("login", [Authentication::class, 'login']);
});



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
