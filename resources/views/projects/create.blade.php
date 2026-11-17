
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear proyecto</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div>
                <label>Título:</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>

            <div>
                <label>Descripción:</label>
                <textarea name="description">{{ old('description') }}</textarea>
            </div>

            <div>
                <label>Fecha límite:</label>
                <input type="date" name="due_date" value="{{ old('due_date') }}">
            </div>

            <div>
                <label>Estado:</label>
                <select name="status">
                    <option value="Pendiente">Pendiente</option>
                    <option value="En progreso">En progreso</option>
                    <option value="Completado">Completado</option>
                </select>
            </div>

            <button type="submit">Guardar proyecto</button>

            <a href="{{ route('projects.index') }}">Cancelar</a>
        </form>
    </div>
@endsection
