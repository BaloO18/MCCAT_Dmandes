<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id(); // ID principal du chauffeur. Correspond à +id int / +idChauffeur int

            $table->string('nom'); // Nom du chauffeur
            $table->string('prenom'); // Prénom du chauffeur
            $table->string('contact')->nullable(); // Numéro de contact du chauffeur (string pour les numéros de téléphone)

            // Vous pouvez ajouter d'autres attributs pertinents pour un chauffeur ici, par exemple:
            // $table->boolean('disponible')->default(true); // Statut de disponibilité
            // $table->string('permis_numero')->unique()->nullable(); // Numéro de permis de conduire

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chauffeurs');
    }
};