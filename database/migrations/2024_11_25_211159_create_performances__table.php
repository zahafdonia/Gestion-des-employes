<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id('id_performance'); // Clé primaire de la table performances
            $table->double('rating'); // Évaluation des performances (notation)
            $table->date('date'); // Date de l'évaluation
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
        Schema::dropIfExists('performances');
    }
}
