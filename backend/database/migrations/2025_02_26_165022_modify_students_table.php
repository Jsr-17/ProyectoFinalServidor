<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('edad')->nullable()->change();

            $table->renameColumn('languaje', 'language');
        });
    }


    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('edad')->nullable(false)->change();

            $table->renameColumn('language', 'languaje');
        });
    }
}
