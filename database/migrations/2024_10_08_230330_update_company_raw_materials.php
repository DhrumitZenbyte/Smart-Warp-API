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
        Schema::table('company_raw_materials', function (Blueprint $table) {
            $table->double('total_pallet')->nullable()->change();
            $table->double('weight_per_pcs')->nullable()->change();
            $table->longText('description_of_goods')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_raw_materials', function (Blueprint $table) {
            $table->double('total_pallet')->nullable(false)->change();
            $table->double('weight_per_pcs')->nullable(false)->change();
            $table->longText('description_of_goods')->nullable(false)->change();
        });
    }
};
