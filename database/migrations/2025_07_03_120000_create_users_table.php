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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Correspond à +id: int de la classe utilisateur

            // Clé étrangère pour le rôle
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict'); // +idRole: int
            // onDelete('restrict') est souvent préféré ici pour ne pas supprimer un rôle si des utilisateurs y sont rattachés.

            // Clé étrangère pour la structure
            $table->foreignId('structure_id')->constrained('structures')->onDelete('restrict'); // idStructure: int
            // De même, on ne supprime pas une structure si des utilisateurs y sont rattachés.

            $table->string('prenom'); // prenom string.
            $table->string('nom'); // +nom: string
            $table->string('email')->unique(); // email: string, doit être unique
            $table->timestamp('email_verified_at')->nullable(); // Utile pour la vérification d'email si activée par Breeze/Jetstream
            $table->string('password'); // +motDePasse: string (sera hashé)
            $table->rememberToken(); // Pour la fonctionnalité "Se souvenir de moi"
            $table->timestamps(); // Pour created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};