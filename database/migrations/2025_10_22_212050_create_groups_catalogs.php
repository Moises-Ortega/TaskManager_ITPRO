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
        Schema::create('group_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('group_priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::table('groups', function(Blueprint $table){
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('priority_id');

            $table->foreign('category_id')->references('id')->on('group_categories');
            $table->foreign('priority_id')->references('id')->on('group_priorities');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // Primero eliminamos las claves foráneas
            $table->dropForeign(['category_id']);
            $table->dropForeign(['priority_id']);

            // Luego eliminamos las columnas
            $table->dropColumn(['category_id', 'priority_id']);
        });

        // Finalmente eliminamos las tablas creadas
        Schema::dropIfExists('group_categories');
        Schema::dropIfExists('group_priorities');
    }

};
