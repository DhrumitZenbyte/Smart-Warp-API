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
        Schema::table('finish_goods', function (Blueprint $table) {
            $table->dropColumn('size_id');
            $table->string('size')->nullable();
            $table->string('hsn_code')->nullable();
            $table->string('micron')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('finish_goods', function (Blueprint $table) {
            $table->dropColumn('size');
            $table->dropColumn('hsn_code');
            $table->dropColumn('micron');
            $table->uuid('size_id')->nullable();
        });
    }
};
