@extends('layouts.app')  

@section('title', 'Dodaj novi projekt')  

@section('content')  
    <h2>Dodaj novi projekt</h2>  

    @if ($errors->any())  
        <div>  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('projects.store') }}" method="POST">  
        @csrf  

        <div>  
            <label for="name">Naziv projekta:</label>  
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>  
        </div>  

        <div>  
            <label for="description">Opis projekta:</label>  
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>  
        </div>  

        <div>  
            <label for="status">Status projekta:</label>  
            <select id="status" name="status" required>  
                <option value="aktivan">Aktivan</option>  
                <option value="zavrsen">Završen</option>  
                <option value="obrisan">Obrisan</option>  
            </select>  
        </div>  

        <div>  
            <label for="responsible">Nadležni:</label>  
            <input type="text" id="responsible" name="responsible" value="{{ old('responsible') }}" required>  
        </div>  

        <div>  
            <button type="submit">Sačuvaj projekt</button>  
        </div>  
    </form>  

    <a href="{{ route('projects.index') }}">Nazad na listu projekata</a>  
@endsection