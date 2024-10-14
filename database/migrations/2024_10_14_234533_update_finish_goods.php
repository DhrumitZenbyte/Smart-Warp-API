<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('finish_goods', function (Blueprint $table) {
            $table->json('dynamic_fields')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('finish_goods', function (Blueprint $table) {
            $table->dropColumn('dynamic_fields');
        });
    }
};
