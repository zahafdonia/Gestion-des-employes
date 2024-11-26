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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('id_admin'); // Clé primaire pour la table admins
            $table->bigInteger('id_user')->unsigned(); // Définir le type de la clé étrangère comme BIGINT
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade'); // Référence correcte à 'id_user' de la table 'users'
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('admins');
    }
    
};
