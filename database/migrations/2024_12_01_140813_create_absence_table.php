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
    Schema::create('absence', function (Blueprint $table) {
        $table->id('idA'); // Utilise auto-increment comme dans le SQL
        $table->date('date');
        $table->string('reason', 200);
        $table->integer('duration');
        $table->unsignedBigInteger('employeeId'); // Il s'agit d'une clé étrangère
        $table->timestamps();

        $table->foreign('employeeId')->references('employeeId')->on('employee'); // Définition de la contrainte FK
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence');
    }
};
