<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/YYYY_MM_DD_HHMMSS_create_user_table.php
    public function up()
{
    Schema::create('user', function (Blueprint $table) {
        $table->id('idU');
        $table->string('email', 200);
        $table->string('password', 62); // Longueur du mot de passe
        $table->string('lastname', 30);
        $table->string('name', 30);
        $table->unsignedBigInteger('idR'); // FK vers la table 'role'
        $table->string('status', 100)->default('active');
        $table->timestamps();

        $table->foreign('idR')->references('idR')->on('role');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
