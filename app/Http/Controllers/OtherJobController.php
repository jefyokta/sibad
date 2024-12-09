<?php

namespace App\Http\Controllers;

use App\Models\OtherJob;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OtherJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $page = 4;

        $otherjobs = OtherJob::paginate(20);
        return view("pages.otherjob.index", compact("otherjobs", "page"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 4;

        return view("pages.otherjob.create", compact("page"));
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
    public function show(OtherJob $otherJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtherJob $otherJob)
    {
        $page = 4;

        return view("pages.otherjob.edit", compact("otherJob", "page"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OtherJob $otherJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtherJob $otherJob)
    {
        //
    }
}
