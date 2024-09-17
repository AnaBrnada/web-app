@extends('layouts.app')

@section('title', 'Lista Projekata')

@section('content')
    <h2>Lista projekata</h2>
    <ul>
        @foreach ($projects as $project)
            <li>{{ $project->name }}</li>
        @endforeach
    </ul>
@endsection
