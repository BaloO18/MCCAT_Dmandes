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
        Schema::create('chauffeur_demande_vehicules', function (Blueprint $table) {
            // Pas de $table->id() car cette table est une table pivot sans ID primaire propre.
            // Les clés primaires composées seront les clés étrangères.

            // Clé étrangère pour le chauffeur
            $table->foreignId('chauffeur_id')->constrained('chauffeurs')->onDelete('restrict');
            // 'restrict' : un chauffeur ne peut pas être supprimé s'il est encore affecté à des demandes.

            // Clé étrangère pour la demande de véhicule
            $table->foreignId('demande_vehicule_id')->constrained('demande_vehicules')->onDelete('cascade');
            // 'cascade' : si une demande de véhicule est supprimée, l'affectation du chauffeur à cette demande est aussi supprimée.

            // Définit une clé primaire composite pour s'assurer qu'une paire chauffeur-demande_vehicule est unique
            $table->primary(['chauffeur_id', 'demande_vehicule_id']);

            $table->timestamps(); // Pour created_at et updated_at (pour savoir quand l'affectation a été faite)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chauffeur_demande_vehicules');
    }
};