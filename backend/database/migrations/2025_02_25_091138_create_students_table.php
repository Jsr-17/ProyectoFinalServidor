<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name", 30);
            $table->string("email", 25);
            $table->integer("edad")->nullable(); // Hacemos que "edad" sea opcional
            $table->string("telephone", 9);
            $table->string("language", 25); // Corregimos el nombre de "languaje" a "language"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
