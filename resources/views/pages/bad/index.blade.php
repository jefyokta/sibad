@extends('layouts.dashboard')
@section('contents')
    @livewire('bads', ['bads' => $bads,"semester"=>$semester])
@endsection
