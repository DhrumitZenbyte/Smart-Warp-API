<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dashboard_raw_material', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_name');
            $table->string('grade')->nullable();
            $table->integer('total_count')->default(0);
            $table->integer('total_pallet')->default(0);
            $table->uuid('created_by')->nullable();
            $table->integer('total_bag')->default(0);
            $table->decimal('total_weight', 10, 2)->default(0.00);
            $table->timestamps();
        });

        DB::table('finish_goods')->update(['dynamic_fields' => null]);

        $companyRawMaterials = DB::table('company_raw_materials')
            ->selectRaw('company_name, created_by, grade, count(*) as total_count, sum(total_pallet) as total_pallet, sum(total_bag) as total_bag, sum(total_weight) as total_weight')
            ->groupBy('company_name', 'grade', 'created_by')
            ->get();


        foreach ($companyRawMaterials as $material) {
            DB::table('dashboard_raw_material')->insert([
                'company_name' => $material->company_name,
                'id' => Uuid::uuid4(),
                'grade' => $material->grade,
                'total_count' => $material->total_count,
                'created_by' => $material->created_by,
                'total_pallet' => $material->total_pallet,
                'total_bag' => $material->total_bag,
                'total_weight' => $material->total_weight,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_raw_material');
    }
};
