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
    Schema::create('admin', function (Blueprint $table) {
        $table->id('idAdmin');
        $table->unsignedBigInteger('idU')->unique(); // Clé étrangère
        $table->timestamps();
    
        // Définir la relation de clé étrangère
        $table->foreign('idU')->references('idU')->on('user')->onDelete('cascade');
    });
    
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
