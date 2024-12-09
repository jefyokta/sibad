<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 2;
        $lecturers = Lecturers::paginate(20);
        return view("pages.lecturer.index", compact("lecturers", "page"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 2;

        return view("pages.lecturer.create", compact("page"));
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
    public function show(Lecturers $lecturers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturers $lecturer)
    {
        $page = 2;

        return view("pages.lecturer.edit", compact("lecturer", "page"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturers $lecturers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturers $lecturers)
    {
        //
    }
}
