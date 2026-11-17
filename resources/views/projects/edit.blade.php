
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar proyecto</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Título:</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}">
            </div>

            <div>
                <label>Descripción:</label>
                <textarea name="description">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label>Fecha límite:</label>
                <input type="date" name="due_date" value="{{ old('due_date', $project->due_date) }}">
            </div>

            <div>
                <label>Estado:</label>
                <select name="status">
                    <option value="Pendiente" {{ $project->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En progreso" {{ $project->status == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                    <option value="Completado" {{ $project->status == 'Completado' ? 'selected' : '' }}>Completado</option>
                </select>
            </div>

            <button type="submit">Guardar cambios</button>

            <a href="{{ route('projects.index') }}">Cancelar</a>
        </form>
    </div>
@endsection
