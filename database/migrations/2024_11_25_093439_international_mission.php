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
            $table->id();
            // Modifie la colonne employeeid pour être employee_id et faire référence à employees
            $table->string('employeeid'); // Accepte des chaînes comme 'EMPL002'
            $table->bigIncrements('mission_id')->change(); // Si mission_id doit être auto-incrémenté
            $table->unsignedBigInteger('user_id'); // Correct pour faire référence à la table users
            $table->string('superviseur');
            $table->string('purpose');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('destination');
            $table->decimal('expenses', 8, 2);
            $table->string('interim');
            $table->string('mission_report')->nullable();
            $table->string('receipt_path')->nullable();
            $table->string('status')->default('pending');
            $table->text('report_details')->nullable(); // Ajouté
            $table->date('report_date')->nullable(); // Ajouté
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('employeeid')->references('id')->on('employees')->onDelete('cascade'); // Relie employee_id à la table employees
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relie user_id à la table users
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
