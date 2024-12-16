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
    Schema::create('performance', function (Blueprint $table) {
        $table->id('idP');
        $table->double('rating');
        $table->date('date');
        $table->unsignedBigInteger('employeeId'); // FK vers la table 'employee'
        $table->timestamps();

        $table->foreign('employeeId')->references('employeeId')->on('employee');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance');
    }
};
