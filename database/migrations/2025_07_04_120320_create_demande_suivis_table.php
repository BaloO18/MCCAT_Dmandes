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
        Schema::create('demande_suivis', function (Blueprint $table) {
            $table->id(); // ID principal de l'entrée de suivi. Correspond à eid int / +idDemande Suivi: int

            // Clé étrangère pour lier à une demande spécifique
            $table->foreignId('demande_id')->constrained('demandes')->onDelete('cascade');
            // Si la demande est supprimée, son suivi l'est aussi.

            $table->text('commentaire'); // +commentaire: string. Utilisation de `text` pour un commentaire potentiellement long.
            $table->timestamps(); // created_at et updated_at pour suivre quand le commentaire a été ajouté/modifié
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_suivis');
    }
};