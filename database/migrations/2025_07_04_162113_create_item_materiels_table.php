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
        Schema::create('item_materiels', function (Blueprint $table) {
            $table->id(); // ID principal de l'élément de matériel

            // Clé étrangère pour lier à la demande de matériel spécifique
            $table->foreignId('demande_materiel_id')->constrained('demande_materiels')->onDelete('cascade');
            // Si la demande de matériel est supprimée, ses éléments détaillés le sont aussi.

            // Clé étrangère pour lier au type de matériel demandé
            $table->foreignId('materiel_id')->constrained('materiels')->onDelete('restrict');
            // Ne pas supprimer un type de matériel s'il est encore référencé par des demandes.

            $table->integer('quantite_demandee'); // Quantité de ce matériel spécifique demandée

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_materiels');
    }
};