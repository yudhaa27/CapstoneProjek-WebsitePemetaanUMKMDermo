<?php

namespace App\Http\Controllers;

use App\Http\Requests\UmkmRequest;
use App\Models\BusinessCategory;
use App\Models\Umkm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource for Admin.
     */
    public function index(Request $request): View
    {
        $query = Umkm::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                  ->orWhere('address', 'ilike', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $umkms = $query->paginate(10)->withQueryString();
        $categories = BusinessCategory::orderBy('name')->get();

        return view('admin.umkm.index', compact('umkms', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = BusinessCategory::orderBy('name')->get();
        return view('admin.umkm.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UmkmRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Unique slug generation
        $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Umkm::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $data['slug'] = $slug;

        // Upload photo if present
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('umkm-images', 'public');
            $data['photo_path'] = $path;
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'Data UMKM berhasil ditambahkan ke database.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm): View
    {
        $umkm->load('category', 'clusterAssignments.run');
        return view('admin.umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm): View
    {
        $categories = BusinessCategory::orderBy('name')->get();
        return view('admin.umkm.edit', compact('umkm', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UmkmRequest $request, Umkm $umkm): RedirectResponse
    {
        $data = $request->validated();

        // Update slug if name changed
        if ($data['name'] !== $umkm->name) {
            $slug = Str::slug($data['name']);
            $originalSlug = $slug;
            $counter = 1;
            while (Umkm::where('slug', $slug)->where('id', '!=', $umkm->id)->exists()) {
                $slug = "{$originalSlug}-{$counter}";
                $counter++;
            }
            $data['slug'] = $slug;
        }

        // Handle photo upload & old photo removal
        if ($request->hasFile('photo')) {
            if ($umkm->photo_path && Storage::disk('public')->exists($umkm->photo_path)) {
                Storage::disk('public')->delete($umkm->photo_path);
            }
            $path = $request->file('photo')->store('umkm-images', 'public');
            $data['photo_path'] = $path;
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'Data UMKM berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm): RedirectResponse
    {
        if ($umkm->photo_path && Storage::disk('public')->exists($umkm->photo_path)) {
            Storage::disk('public')->delete($umkm->photo_path);
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'Data UMKM berhasil dihapus.');
    }
}
