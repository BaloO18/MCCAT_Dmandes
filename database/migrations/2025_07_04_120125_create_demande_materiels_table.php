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
        Schema::create('demande_materiels', function (Blueprint $table) {
            $table->id(); // ID principal de cette demande de matériel spécifique. Correspond à eid int / id DemandeMaterial: int

            // Clé étrangère pour lier à la demande générique
            $table->foreignId('demande_id')->constrained('demandes')->onDelete('cascade');
            // Si la demande générique est supprimée, cette entrée de demande de matériel l'est aussi.

            // Vous pouvez ajouter ici des champs spécifiques à l'ensemble de la demande de matériel,
            // par exemple, une date de besoin, un commentaire général sur la demande de matériel.
            // $table->date('date_besoin_prevue');
            // $table->text('notes_generales')->nullable();

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_materiels');
    }
};