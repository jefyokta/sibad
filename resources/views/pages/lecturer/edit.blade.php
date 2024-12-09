@extends('layouts.dashboard')

@section('contents')


@livewire('lecturer-edit', ['lecturer' => $lecturer])


@endsection
