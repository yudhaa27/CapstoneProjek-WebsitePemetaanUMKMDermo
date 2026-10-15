<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Umkm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Beranda Publik
     */
    public function home(): View
    {
        $totalUmkm = Umkm::where('status', 'published')->count();
        $totalCategories = BusinessCategory::count();
        $recentUmkms = Umkm::with('category')
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();
        $categories = BusinessCategory::withCount(['umkms' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        return view('public.home', compact('totalUmkm', 'totalCategories', 'recentUmkms', 'categories'));
    }

    /**
     * Halaman Peta Persebaran UMKM
     */
    public function map(Request $request): View
    {
        $categories = BusinessCategory::orderBy('name')->get();
        return view('public.map', compact('categories'));
    }

    /**
     * Data JSON Marker UMKM untuk Leaflet
     */
    public function mapData(Request $request): JsonResponse
    {
        $query = Umkm::with(['category', 'latestClusterAssignment'])
            ->where('status', 'published')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude');

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                  ->orWhere('address', 'ilike', "%{$search}%");
            });
        }

        $umkms = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'category' => $item->category?->name ?? 'Umum',
                'category_slug' => $item->category?->slug ?? '',
                'address' => $item->address,
                'lat' => (float) $item->latitude,
                'lng' => (float) $item->longitude,
                'business_scale' => ucfirst($item->business_scale),
                'sales_channel' => ucfirst($item->sales_channel),
                'phone' => $item->public_phone,
                'photo_url' => $item->photo_path ? asset('storage/' . $item->photo_path) : null,
                'detail_url' => route('public.detail', $item->slug),
                'cluster_label' => $item->latestClusterAssignment?->cluster_label,
            ];
        });

        return response()->json([
            'status' => 'success',
            'count' => $umkms->count(),
            'data' => $umkms,
        ]);
    }

    /**
     * Halaman Daftar/Katalog UMKM
     */
    public function list(Request $request): View
    {
        $query = Umkm::with('category')->where('status', 'published');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                  ->orWhere('description', 'ilike', "%{$search}%")
                  ->orWhere('address', 'ilike', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('scale')) {
            $query->where('business_scale', $request->input('scale'));
        }

        $umkms = $query->latest()->paginate(9)->withQueryString();
        $categories = BusinessCategory::withCount(['umkms' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        return view('public.list', compact('umkms', 'categories'));
    }

    /**
     * Halaman Detail UMKM
     */
    public function detail(string $slug): View
    {
        $umkm = Umkm::with(['category', 'latestClusterAssignment'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedUmkms = Umkm::with('category')
            ->where('category_id', $umkm->category_id)
            ->where('id', '!=', $umkm->id)
            ->where('status', 'published')
            ->take(3)
            ->get();

        return view('public.detail', compact('umkm', 'relatedUmkms'));
    }
}
