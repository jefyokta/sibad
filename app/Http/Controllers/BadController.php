<?php

namespace App\Http\Controllers;

use App\Models\Bad;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BadController extends Controller
{

    public function index(Request $request): View
    {
        $semester_id = $request->query('s', Semester::current()->id);
        $bads = Bad::where('semester_id', $semester_id)->get();

        $semester = Semester::find($semester_id);
        $page = 6;
        return view("pages.bad.index", compact('bads', "page","semester"));
    }

    public function update(Bad $bad)
    {

        //
    }
}
