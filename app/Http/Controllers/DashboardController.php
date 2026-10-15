<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\ClusterRun;
use App\Models\Umkm;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan Ringkasan Dashboard Admin
     */
    public function index(): View
    {
        $totalUmkm = Umkm::count();
        $publishedCount = Umkm::where('status', 'published')->count();
        $draftCount = Umkm::where('status', '!=', 'published')->count();
        $withCoordsCount = Umkm::whereNotNull('latitude')->whereNotNull('longitude')->count();

        $scaleCounts = [
            'mikro' => Umkm::where('business_scale', 'mikro')->count(),
            'kecil' => Umkm::where('business_scale', 'kecil')->count(),
            'menengah' => Umkm::where('business_scale', 'menengah')->count(),
        ];

        $categories = BusinessCategory::withCount('umkms')->get();

        $latestUmkms = Umkm::with('category')->latest()->take(5)->get();
        $latestClusterRun = ClusterRun::latest()->first();

        return view('admin.dashboard', compact(
            'totalUmkm',
            'publishedCount',
            'draftCount',
            'withCoordsCount',
            'scaleCounts',
            'categories',
            'latestUmkms',
            'latestClusterRun'
        ));
    }
}
