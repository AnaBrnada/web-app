@extends('layouts.app')  

@section('title', 'Pregled projekta')  

@section('content')  
    <h2>Detalji projekta: {{ $project->name }}</h2>  

    <ul>  
        <li><strong>Opis:</strong> {{ $project->description }}</li>  
        <li><strong>Status:</strong> {{ $project->status }}</li>  
        <li><strong>Nadležni:</strong> {{ $project->responsible }}</li>  
        <li><strong>Datum kreiranja:</strong> {{ $project->created_at->format('d.m.Y') }}</li>  
        <li><strong>Datum izmena:</strong> {{ $project->updated_at->format('d.m.Y') }}</li>  
    </ul>  

    <a href="{{ route('projects.edit', $project->id) }}">Uredi projekt</a>  
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">  
        @csrf  
        @method('DELETE')  
        <button type="submit">Obriši projekt</button>  
    </form>  
    <a href="{{ route('projects.index') }}">Nazad na listu projekata</a>  
@endsection