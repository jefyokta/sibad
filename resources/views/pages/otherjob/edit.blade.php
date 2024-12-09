@extends('layouts.dashboard')
@section('contents')
    @livewire('otherjob', ['id' => $otherJob->id])
@endsection
