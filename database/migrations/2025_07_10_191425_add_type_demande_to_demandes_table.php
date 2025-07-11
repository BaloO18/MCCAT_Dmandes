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
        Schema::table('demandes', function (Blueprint $table) {
            $table->string('typeDemande')->after('dateDemande'); // Ajoute la colonne après dateDemande
            // Assurez-vous que la colonne statut a bien une valeur par défaut si ce n'est pas déjà le cas
            // $table->string('statut')->default('En attente')->change(); // Décommentez si vous devez changer le statut
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropColumn('typeDemande');
        });
    }
};