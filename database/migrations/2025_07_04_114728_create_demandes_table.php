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
        // ... dans la fonction up()
Schema::create('demandes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('materiel_id')->constrained()->onDelete('cascade');
    $table->date('dateDemande');
    $table->string('typeDemande'); // Nouvelle colonne pour le type de demande (ex: Achat, Réparation, Prêt, Remplacement)
    $table->string('statut')->default('En attente'); // Statut par défaut
    $table->text('description')->nullable();
    $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};