<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Uses unsignedBigInteger by default
            $table->string('employeeid')->unique();
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->string('position');
            $table->decimal('salary', 10, 2);
            $table->unsignedBigInteger('idU')->nullable();
            $table->foreign('idU')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
