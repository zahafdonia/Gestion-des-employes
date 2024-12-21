<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('employee_id')->unique();
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->string('position');
            $table->decimal('salary', 10, 2);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
