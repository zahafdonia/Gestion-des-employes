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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id_role'); // Clé primaire auto-incrémentée
            $table->string('name')->unique(); // Exemple : "Admin", "Employee"
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at
        });

        // On peut ajouter des rôles de base ici (Admin, Employee) via un seeder
        // Exemple : 'Admin' aura l'ID 1, 'Employee' aura l'ID 2

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user'); // Clé primaire auto-incrémentée
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role')
                  ->constrained()
                  ->onDelete('cascade')
                  ->default(2); // Valeur par défaut 2 (Employee)
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
