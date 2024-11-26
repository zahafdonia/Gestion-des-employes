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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id_employee'); // Clé primaire auto-incrémentée avec le nom exact 'id_employee'
            $table->string('city', 100); // Ville de l'employé, chaîne de caractères avec une limite de 100 caractères
            $table->string('address', 100); // Adresse de l'employé, chaîne de caractères avec une limite de 100 caractères
            $table->string('position', 30); // Poste de l'employé, chaîne de caractères avec une limite de 30 caractères
            $table->double('salary'); // Salaire de l'employé, de type double
            $table->unsignedBigInteger('id_user'); // Clé étrangère 'id_user', correspondant à l'ID de l'utilisateur dans la table 'users'
            
            // Définir la relation de clé étrangère entre 'id_user' et 'id_user' dans la table 'users'
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade'); 
    
            $table->timestamps(); // Timestamps pour la date de création et mise à jour
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('employees');
    }
    
};
