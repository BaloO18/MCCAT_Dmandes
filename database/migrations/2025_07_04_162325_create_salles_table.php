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
        Schema::create('salles', function (Blueprint $table) {
            $table->id(); // ID principal de la salle

            $table->string('nom')->unique(); // Nom ou désignation de la salle (ex: "Salle Alpha", "Amphithéâtre B")
            $table->integer('capacite'); // Nombre de personnes que la salle peut accueillir

            // Vous pouvez ajouter d'autres attributs pertinents pour une salle ici, par exemple:
            // $table->string('equipements')->nullable(); // Liste d'équipements (projecteur, tableau blanc, etc.)
            // $table->string('localisation')->nullable(); // Bâtiment, étage, etc.

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salles');
    }
};