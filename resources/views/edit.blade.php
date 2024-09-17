@extends('layouts.app')  

@section('title', 'Uredi projekt')  

@section('content')  
    <h2>Uredi projekt: {{ $project->name }}</h2>  

    @if ($errors->any())  
        <div>  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('projects.update', $project->id) }}" method="POST">  
        @csrf  
        @method('PUT')  

        <div>  
            <label for="name">Naziv projekta:</label>  
            <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" required>  
        </div>  

        <div>  
            <label for="description">Opis projekta:</label>  
            <textarea id="description" name="description" required>{{ old('description', $project->description) }}</textarea>  
        </div>  

        <div>  
            <label for="status">Status projekta:</label>  
            <select id="status" name="status" required>  
                <option value="aktivan" {{ $project->status == 'aktivan' ? 'selected' : '' }}>Aktivan</option>  
                <option value="zavrsen" {{ $project->status == 'zavrsen' ? 'selected' : '' }}>Završen</option>  
                <option value="obrisan" {{ $project->status == 'obrisan' ? 'selected' : '' }}>Obrisan</option>  
            </select>  
        </div>  

        <div>  
            <label for="responsible">Nadležni:</label>  
            <input type="text" id="responsible" name="responsible" value="{{ old('responsible', $project->responsible) }}" required>  
        </div>  

        <div>  
            <button type="submit">Sačuvaj izmene</button>  
        </div>  
    </form>  
    
    <a href="{{ route('projects.index') }}">Nazad na listu projekata</a>  
@endsection