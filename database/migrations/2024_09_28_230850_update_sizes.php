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
        Schema::table('sizes', function (Blueprint $table) {
            $table->integer('size_in_cm')->nullable()->change();
            $table->integer('size_in_mm')->nullable()->change();
            $table->integer('thickness')->nullable()->change();
            $table->string('meter')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sizes', function (Blueprint $table) {
            $table->integer('size_in_cm')->nullable(false)->change();
            $table->integer('size_in_mm')->nullable(false)->change();
            $table->integer('thickness')->nullable(false)->change();
            $table->dropColumn('meter');
        });
    }
};
