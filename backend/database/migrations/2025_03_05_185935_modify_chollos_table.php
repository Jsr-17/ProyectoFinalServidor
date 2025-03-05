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
        Schema::table('comentario', function (Blueprint $table) {

            $table->unsignedBigInteger('id_chollo')->after('id_usuario');


            $table->foreign('id_chollo')->references('id')->on('chollo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comentario', function (Blueprint $table) {

            $table->dropForeign(['id_chollo']);

            $table->dropColumn('id_chollo');
        });
    }
};
