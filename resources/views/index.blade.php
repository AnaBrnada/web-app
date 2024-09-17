@extends('layouts.app')

@section('title', 'Lista Projekata')

@section('content')
    <h2>Lista projekata</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Status</th>
                <th>Nadležni</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->responsible }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}">Uredi</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Obriši</button>
                    </form>
                    <a href="{{ route('projects.show', $project->id) }}">Pregledaj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Paginacija (opcionalno) -->
    {{ $projects->links() }}
@endsection
