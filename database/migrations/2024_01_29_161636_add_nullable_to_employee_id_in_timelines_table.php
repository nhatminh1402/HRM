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
        Schema::table('timelines', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->nullable()->change();
            $table->unsignedBigInteger('position_id')->nullable()->change();
            $table->dropForeign(['employee_id']);
            $table->foreign('employee_id')->references('id')->on('employees')->nullOnDelete();
            $table->dropForeign(['position_id']);
            $table->foreign('position_id')->references('id')->on('positions')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timelines', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['position_id']);
            $table->unsignedBigInteger('employee_id')->nullable(false)->change();
            $table->unsignedBigInteger('position_id')->nullable(false)->change();
        });
    }
};
