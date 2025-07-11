<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // N'oubliez pas d'importer le modèle User
use Illuminate\Support\Facades\Hash; // Pour hasher le mot de passe

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Super',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Mot de passe 'password'
            'role_id' => 1, // Assurez-vous que l'ID 1 est votre rôle 'Administrateur'
            'structure_id' => 2, // Assurez-vous que l'ID 2 est 'Direction Informatique' ou autre structure
        ]);
        User::create([
            'nom' => 'Dupont',
            'prenom' => 'Marie',
            'email' => 'marie.dupont@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // 'Utilisateur standard'
            'structure_id' => 1, // 'Direction des Ressources Humaines'
        ]);
        // Ajoutez d'autres utilisateurs
    }
}