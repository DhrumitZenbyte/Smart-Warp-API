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
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn(['otp_mobile_phone', 'fax_no', 'company_register', 'gst_circular_no']);
            $table->renameColumn('mobile', 'mobile_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('otp_mobile_phone')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('company_register')->nullable();
            $table->string('gst_circular_no')->nullable();
            $table->renameColumn('mobile_no', 'mobile');
        });
    }
};
