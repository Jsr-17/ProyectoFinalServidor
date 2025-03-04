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
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            $table->string("mensaje");
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_comentario")->nullable();

            $table->timestamps();

            $table->foreign("id_comentario")->references("id")->on("comentario")->onDelete("set null");
            $table->foreign("id_usuario")->references("id")->on("usuario");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
