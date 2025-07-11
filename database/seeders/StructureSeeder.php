<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Structure; // N'oubliez pas d'importer le modèle Structure

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Structure::create(['designation' => 'Direction des Ressources Humaines']);
        Structure::create(['designation' => 'Direction Informatique']);
        Structure::create(['designation' => 'Service Comptabilité']);
        // Ajoutez d'autres structures
    }
}