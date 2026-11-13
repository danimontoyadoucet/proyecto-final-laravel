<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuarios
        $ana = User::create([
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'password' => Hash::make('password'),
        ]);

        $carlos = User::create([
            'name' => 'Carlos',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password'),
        ]);

        $laura = User::create([
            'name' => 'Laura',
            'email' => 'laura@example.com',
            'password' => Hash::make('password'),
        ]);

        // Crear proyectos
        $proyecto1 = Project::create([
            'user_id' => $ana->id,
            'title' => 'Aplicación web',
            'description' => 'Desarrollo de una aplicación web.',
            'due_date' => '2026-12-20',
            'status' => 'En progreso',
        ]);

        $proyecto2 = Project::create([
            'user_id' => $carlos->id,
            'title' => 'Tienda online',
            'description' => 'Desarrollo de una tienda online.',
            'due_date' => '2026-12-30',
            'status' => 'Pendiente',
        ]);

        $proyecto3 = Project::create([
            'user_id' => $laura->id,
            'title' => 'Portfolio personal',
            'description' => 'Creación de un portfolio personal.',
            'due_date' => '2026-11-01',
            'status' => 'Completado',
        ]);

        // Añadir participantes
        $proyecto1->participants()->attach($carlos->id, [
            'role' => 'Desarrollador',
            'contribution_hours' => 12.50,
        ]);

        $proyecto1->participants()->attach($laura->id, [
            'role' => 'Diseñadora',
            'contribution_hours' => 8.00,
        ]);

        $proyecto2->participants()->attach($ana->id, [
            'role' => 'Tester',
            'contribution_hours' => 5.00,
        ]);
    }
}

