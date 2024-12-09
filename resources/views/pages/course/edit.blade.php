@extends('layouts.dashboard')

@section('contents')
    @livewire('course-update', ['course' => $course])
@endsection
