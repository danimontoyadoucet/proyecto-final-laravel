
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Crear proyecto
        </h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Título:
                </label>

                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Descripción:
                </label>

                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Fecha límite:
                </label>

                <input type="date" name="due_date" value="{{ old('due_date') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Estado:
                </label>

                <select name="status"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="Pendiente">Pendiente</option>
                    <option value="En progreso">En progreso</option>
                    <option value="Completado">Completado</option>

                </select>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Guardar proyecto
                </button>

                <a href="{{ route('projects.index') }}"
                   class="bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>
@endsection
