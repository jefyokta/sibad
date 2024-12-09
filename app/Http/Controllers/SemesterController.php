<?php

namespace App\Http\Controllers;

use App\Exports\BadExport;
use App\Models\Semester;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 7;
        $semesters = Semester::all();
        return view("pages.semester.index", compact('semesters',"page"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }

    public function export(Semester $semester)
    {

        return Excel::download(new BadExport($semester), 'test.xlsx');
    }
}
