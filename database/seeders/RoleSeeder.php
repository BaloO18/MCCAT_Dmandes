<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role; // N'oubliez pas d'importer le modèle Role

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['nomRole' => 'Administrateur']);
        Role::create(['nomRole' => 'Utilisateur standard']);
        Role::create(['nomRole' => 'Gestionnaire']);
        // Ajoutez d'autres rôles si nécessaire
    }
}