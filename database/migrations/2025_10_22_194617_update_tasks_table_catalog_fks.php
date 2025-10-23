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
        Schema::table('tasks', function(Blueprint $table){
            $table->dropColumn('status');
            $table->dropColumn('priority');

            $table->unsignedInteger('status_id');
            $table->unsignedInteger('priority_id');
            
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->foreign('priority_id')->references('id')->on('task_priorities');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function(Blueprint $table){
            $table->dropForeign(['status_id']);
            $table->dropForeign(['priority_id']);

            $table->dropColumn('status_id');
            $table->dropColumn('priority_id');

            $table->string('status');
            $table->string('priority');
        });
    }
};
