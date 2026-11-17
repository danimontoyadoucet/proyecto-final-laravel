
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del proyecto</h1>

        <h2>{{ $project->title }}</h2>

        <p>
            <strong>Descripción:</strong>
            {{ $project->description }}
        </p>

        <p>
            <strong>Fecha límite:</strong>
            {{ $project->due_date }}
        </p>

        <p>
            <strong>Estado:</strong>
            {{ $project->status }}
        </p>

        <a href="{{ route('projects.edit', $project->id) }}">
            Editar proyecto
        </a>

        <a href="{{ route('projects.index') }}">
            Volver al listado
        </a>
    </div>
@endsection
