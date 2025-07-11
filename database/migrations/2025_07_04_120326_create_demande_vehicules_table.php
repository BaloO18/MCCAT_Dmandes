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
        Schema::create('demande_vehicules', function (Blueprint $table) {
            $table->id(); // ID principal de cette demande de véhicule spécifique

            // Clé étrangère pour lier à la demande générique
            // Ceci assure que chaque demande de véhicule est une "sous-catégorie" d'une entrée dans la table 'demandes'
            // et que son ID unique est également un foreign key à la table 'demandes'.
            $table->foreignId('demande_id')->constrained('demandes')->onDelete('cascade');
            // Si la demande générique est supprimée, la demande de véhicule détaillée l'est aussi.

            $table->integer('nombre_places'); // Correspond à +nbrePlace: int. Renommé pour clarté.
            $table->integer('nombre_vehicules'); // Correspond à +nbreVehicule: int. Renommé pour clarté.
            $table->dateTime('date_depart_prevue'); // Correspond à +dateDepart: datetime. Renommé pour clarté.
            // On peut ajouter une date_retour_prevue si pertinent pour la planification
            // $table->dateTime('date_retour_prevue');

            // Vous pouvez ajouter d'autres champs spécifiques aux demandes de véhicules ici,
            // comme la destination, l'objectif de la mission, etc.
            // $table->string('destination');
            // $table->text('objectif_mission');

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_vehicules');
    }
};