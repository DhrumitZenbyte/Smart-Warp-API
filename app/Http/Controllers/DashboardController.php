<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyRawMaterial;
use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyRawMaterials = Dashboard::where('created_by', auth()->user()->id)->select(
            'id',
            'company_name',
            'grade',
            'total_pallet',
            'total_bag',
            'total_weight',
        )->get()->toArray();


        $companyRawMaterialsCollection = collect($companyRawMaterials);

        $totalPallet = $companyRawMaterialsCollection->sum('total_pallet');
        $totalBag = $companyRawMaterialsCollection->sum('total_bag');
        $totalWeight = $companyRawMaterialsCollection->sum('total_weight');

        return response()->json([
            'status' => 'success',
            'dashboard' => [
                'total_pallet' => $totalPallet,
                'total_bag' => $totalBag,
                'total_weight' => $totalWeight,
                'company_raw_materials' => $companyRawMaterials,
            ],
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
