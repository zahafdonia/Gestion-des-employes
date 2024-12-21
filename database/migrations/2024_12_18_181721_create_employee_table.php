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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id'); // Clé primaire
            $table->unsignedBigInteger('idU')->unique(); // Clé étrangère vers 'users'
            $table->string('address')->nullable(); // Adresse de l'employé
            $table->string('city')->nullable(); // Ville de l'employé
            $table->string('position')->nullable(); // Poste de l'employé
            $table->decimal('salary', 8, 2)->nullable(); // Salaire
            $table->string('status', 100)->default('inactive'); // Statut de l'employé
            $table->timestamps(); // Horodatage (created_at, updated_at)

            // Définir la relation de clé étrangère
            $table->foreign('idU')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
