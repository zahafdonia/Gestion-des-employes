<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_nbrjconge_to_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNbrjcongeToEmployeeTable extends Migration
{
    public function up()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->integer('nbrjconge')->default(0); // Nombre de jours de congé disponibles, avec une valeur par défaut
        });
    }

    public function down()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->dropColumn('nbrjconge');
        });
    }
}

