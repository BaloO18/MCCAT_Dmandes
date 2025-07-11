<?php

namespace Database\Seeders;

// Supprimez cette ligne si elle existe, ou assurez-vous qu'elle n'entre pas en conflit avec d'autres use statements.
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appelez vos seeders ici
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            StructureSeeder::class,
            UserSeeder::class,
            // Ajoutez ici d'autres seeders à mesure que vous les créez (ex: SalleSeeder, MaterielSeeder, ChauffeurSeeder, etc.)
        ]);
    }
}