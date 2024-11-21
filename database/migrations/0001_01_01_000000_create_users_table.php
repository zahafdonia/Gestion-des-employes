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
        // Créer la table des tokens de réinitialisation de mot de passe
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email comme clé primaire
            $table->string('token'); // Token de réinitialisation
            $table->timestamp('created_at')->nullable(); // Date de création du token
        });

        // Créer la table des sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Clé primaire de la session
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->index(); // ID de l'utilisateur, avec contrainte étrangère et suppression en cascade
            $table->string('ip_address', 45)->nullable(); // Adresse IP de l'utilisateur
            $table->text('user_agent')->nullable(); // Agent utilisateur
            $table->longText('payload'); // Informations de la session
            $table->integer('last_activity')->index(); // Dernière activité de la session
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer les tables dans l'ordre inverse
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
    }
};
