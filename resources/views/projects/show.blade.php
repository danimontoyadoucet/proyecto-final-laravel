
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

        <h2>Asignar usuarios al proyecto</h2>

        <form action="{{ route('projects.assignUser', $project->id) }}" method="POST">
            @csrf

            <div>
                <label>Usuario:</label>
                <select name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Rol:</label>
                <input type="text" name="role">
            </div>

            <div>
                <label>Horas de contribución:</label>
                <input type="number" name="contribution_hours" min="0" step="0.01">
            </div>

            <button type="submit">Asignar usuario</button>
        </form>

        <a href="{{ route('projects.edit', $project->id) }}">
            Editar proyecto
        </a>

        <a href="{{ route('projects.index') }}">
            Volver al listado
        </a>

        <h2>Participantes del proyecto</h2>

@foreach ($participants as $participant)
    <div>
        <p><strong>Nombre:</strong> {{ $participant->name }}</p>
        <p><strong>Rol:</strong> {{ $participant->pivot->role }}</p>
        <p><strong>Horas de contribución:</strong> {{ $participant->pivot->contribution_hours }}</p>
    </div>
@endforeach
    </div>
@endsection
