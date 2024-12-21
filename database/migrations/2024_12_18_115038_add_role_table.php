<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            // Création de la table 'roles' avec la colonne role_id en tant que clé primaire
            $table->id('role_id'); // Création d'une colonne 'role_id' auto-incrémentée
            $table->string('name')->unique(); // Nom du rôle (ex : 'Admin', 'Employee', etc.)
            $table->timestamps(); // Création des colonnes created_at et updated_at
        });
       // Ajouter les rôles par défaut
       DB::table('roles')->insert([
        ['role_id' => 1, 'name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ['role_id' => 2, 'name' => 'employee', 'created_at' => now(), 'updated_at' => now()],
    ]);
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('roles'); // Suppression de la table 'roles'
    }
}
;