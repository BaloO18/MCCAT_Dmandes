<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission; // N'oubliez pas d'importer le modèle Permission

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['libelle' => 'Gérer les utilisateurs']);
        Permission::create(['libelle' => 'Gérer les demandes']);
        Permission::create(['libelle' => 'Approuver demandes']);
        Permission::create(['libelle' => 'Voir rapports']);
        // Ajoutez d'autres permissions
    }
}