
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Editar proyecto
        </h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Título:
                </label>

                <input type="text" name="title"
                       value="{{ old('title', $project->title) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Descripción:
                </label>

                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Fecha límite:
                </label>

                <input type="date" name="due_date"
                       value="{{ old('due_date', $project->due_date) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Estado:
                </label>

                <select name="status"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="Pendiente" {{ $project->status == 'Pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>

                    <option value="En progreso" {{ $project->status == 'En progreso' ? 'selected' : '' }}>
                        En progreso
                    </option>

                    <option value="Completado" {{ $project->status == 'Completado' ? 'selected' : '' }}>
                        Completado
                    </option>

                </select>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Guardar cambios
                </button>

                <a href="{{ route('projects.index') }}"
                   class="inline-block bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>
@endsection

