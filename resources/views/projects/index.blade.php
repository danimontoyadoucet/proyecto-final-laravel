
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis proyectos</h1>

        <a href="{{ route('projects.create') }}">
            Crear proyecto
        </a>

        @foreach ($projects as $project)
            <div>
                <h2>{{ $project->title }}</h2>

                <p>{{ $project->description }}</p>
                <p>Fecha límite: {{ $project->due_date }}</p>
                <p>Estado: {{ $project->status }}</p>

                <a href="{{ route('projects.show', $project->id) }}">
                    Ver
                </a>

                <a href="{{ route('projects.edit', $project->id) }}">
                    Editar
                </a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
