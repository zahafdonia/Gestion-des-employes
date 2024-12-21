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
        Schema::create('international_missions', function (Blueprint $table) {
            $table->id(); // Clé primaire pour la table international_missions
            $table->unsignedBigInteger('employee_id'); // Ajoute la colonne employee_id pour la clé étrangère
            $table->foreign('employee_id') // Définit la clé étrangère
                  ->references('employee_id') // Référence la clé primaire de la table employees
                  ->on('employees')
                  ->onDelete('cascade');
        
            $table->string('mission_id')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('superviseur');
            $table->string('purpose');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('destination');
            $table->decimal('expenses', 8, 2);
            $table->string('interim')->default('No interim'); // Ajouter une valeur par défaut
            $table->string('mission_report')->nullable();
            $table->string('receipt_path')->nullable();
            $table->string('status')->default('pending');
            $table->text('report_details')->nullable();
            $table->date('report_date')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('international_missions');
    }
};
