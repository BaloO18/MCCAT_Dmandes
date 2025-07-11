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
        Schema::create('demande_salles', function (Blueprint $table) {
            $table->id(); // ID principal de cette demande de salle spécifique

            // Clé étrangère pour lier à la demande générique
            $table->foreignId('demande_id')->constrained('demandes')->onDelete('cascade');
            // Si la demande générique est supprimée, la demande de salle détaillée l'est aussi.

            // La clé étrangère vers la future table 'salles' (qui listera les salles disponibles)
            // Nous ne pouvons pas ajouter la contrainte `constrained('salles')` pour l'instant
            // car la table 'salles' n'existe pas encore. Nous l'ajouterons plus tard.
            $table->unsignedBigInteger('salle_id')->nullable(); // Correspond à +idSalle: int
            // Nous laissons 'nullable' pour l'instant car la salle pourrait être attribuée après la demande.
            // La contrainte sera ajoutée dans une migration séparée une fois 'salles' créée.

            $table->integer('nombre_personnes'); // Correspond à +nbre Personne: int. Renommé pour clarté.
            $table->date('date_debut'); // Correspond à +dateDebut: date
            $table->date('date_fin'); // Correspond à +dateFin: date
            $table->time('heure_debut'); // Correspond à +heureDebut: time
            $table->time('heure_fin'); // Correspond à +heureFin: time

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_salles');
    }
};