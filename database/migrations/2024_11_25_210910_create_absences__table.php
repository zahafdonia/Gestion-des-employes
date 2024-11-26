<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id('id_absence'); // Clé primaire de la table absences
            $table->date('date'); // Date de l'absence
            $table->string('reason', 200); // Motif de l'absence
            $table->integer('duration'); // Durée de l'absence (en jours)
            $table->foreignId('id_employee') // Clé étrangère vers la table employees
                  ->constrained('employees', 'id_employee')
                  ->onDelete('cascade'); // Suppression en cascade
            $table->timestamps(); // Timestamps pour les dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
}
