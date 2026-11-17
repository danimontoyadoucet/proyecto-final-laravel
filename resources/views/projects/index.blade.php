
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Mis proyectos
    </h1>

    <a href="{{ route('projects.create') }}"
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
        Crear proyecto
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @foreach ($projects as $project)

            <div class="bg-white p-6 rounded-lg shadow">

                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $project->title }}
                </h2>

                <p class="text-gray-600 mb-3">
                    {{ $project->description }}
                </p>

                <p class="text-sm text-gray-500">
                    Fecha límite: {{ $project->due_date }}
                </p>

                <p class="text-sm text-gray-500 mb-4">
                    Estado: {{ $project->status }}
                </p>

                <div class="flex gap-3">

                    <a href="{{ route('projects.show', $project->id) }}"
                       class="inline-block bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700">
                        Ver
                    </a>

                    <a href="{{ route('projects.edit', $project->id) }}"
                       class="inline-block bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600">
                        Editar
                    </a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700">
                            Eliminar
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    </div>

</div>
@endsection
