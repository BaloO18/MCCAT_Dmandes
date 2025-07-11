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
        Schema::table('demande_salles', function (Blueprint $table) {
            // Ajout de la contrainte de clé étrangère
            // Assurez-vous que 'salle_id' est bien unsignedBigInteger dans la migration précédente
            $table->foreign('salle_id')
                  ->references('id')
                  ->on('salles')
                  ->onDelete('restrict'); // Ou 'set null' si une demande de salle peut exister sans salle attribuée
                                         // 'restrict' est plus sûr : empêche la suppression d'une salle si elle est liée à une demande
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_salles', function (Blueprint $table) {
            // Suppression de la contrainte de clé étrangère
            $table->dropForeign(['salle_id']);
        });
    }
};