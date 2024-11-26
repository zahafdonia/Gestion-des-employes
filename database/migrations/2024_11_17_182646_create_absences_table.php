<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    public function up()
    {
        Schema::create('absence', function (Blueprint $table) {
            $table->id('idA');
            $table->date('date');
            $table->string('reason');
            $table->integer('duration');
            $table->unsignedBigInteger('employeeid');  // matches the 'id' type in employees
            $table->foreign('employeeid')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absence');
    }
}
