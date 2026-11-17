

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto">

        <!-- Información del proyecto -->
        <div class="bg-white p-8 rounded-lg shadow mb-6">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Detalles del proyecto
            </h1>

            <h2 class="text-xl font-bold text-gray-800 mb-3">
                {{ $project->title }}
            </h2>

            <p class="text-gray-600 mb-4">
                <strong>Descripción:</strong>
                {{ $project->description }}
            </p>

            <p class="text-gray-600 mb-2">
                <strong>Fecha límite:</strong>
                {{ $project->due_date }}
            </p>

            <p class="text-gray-600 mb-6">
                <strong>Estado:</strong>
                {{ $project->status }}
            </p>

            <div class="flex gap-3">

                <a href="{{ route('projects.edit', $project->id) }}"
                   class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Editar proyecto
                </a>

                <a href="{{ route('projects.index') }}"
                   class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Volver al listado
                </a>

            </div>

        </div>

        <!-- Asignar usuarios -->
        <div class="bg-white p-8 rounded-lg shadow mb-6">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Asignar usuarios al proyecto
            </h2>

            <form action="{{ route('projects.assignUser', $project->id) }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Usuario:
                    </label>

                    <select name="user_id"
                            class="w-full border border-gray-300 rounded px-3 py-2">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Rol:
                    </label>

                    <input type="text" name="role"
                           class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Horas de contribución:
                    </label>

                    <input type="number" name="contribution_hours" min="0" step="0.01"
                           class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Asignar usuario
                </button>

            </form>

        </div>

        <!-- Participantes -->
        <div class="bg-white p-8 rounded-lg shadow">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Participantes del proyecto
            </h2>

            @foreach ($participants as $participant)

                <div class="border border-gray-200 rounded p-4 mb-3">

                    <p class="text-gray-800 mb-2">
                        <strong>Nombre:</strong> {{ $participant->name }}
                    </p>

                    <p class="text-gray-600 mb-2">
                        <strong>Rol:</strong> {{ $participant->pivot->role }}
                    </p>

                    <p class="text-gray-600">
                        <strong>Horas de contribución:</strong>
                        {{ $participant->pivot->contribution_hours }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>
@endsection

