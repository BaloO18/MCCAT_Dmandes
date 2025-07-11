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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id(); // ID principal du matériel. Correspond à +id: int / +idMateriel: int

            $table->string('nom')->unique(); // Nom du type de matériel (ex: "Ordinateur portable", "Projecteur")
            $table->text('description')->nullable(); // Description du matériel (ex: "Marque Dell, modèle XPS 15")
            $table->string('designation')->unique(); // Exemple: "Ordinateur portable", "Écran", "Souris"
            $table->integer('stock_actuel')->default(0); // Quantité disponible en stock. Correspond à +quantite: int

            // Vous pouvez ajouter d'autres attributs pertinents pour un matériel ici, par exemple:
            // $table->string('numero_inventaire')->nullable(); // Numéro d'inventaire unique pour chaque pièce si besoin
            // $table->decimal('prix_unitaire', 8, 2)->nullable();
            // $table->string('localisation_stock')->nullable();

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};