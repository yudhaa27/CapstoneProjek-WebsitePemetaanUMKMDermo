@extends('layouts.admin')

@section('title', 'Detail UMKM: ' . $umkm->name)
@section('page_title', 'Profil Rinci UMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <!-- Header Banner with Status & Actions -->
        <div class="p-6 bg-slate-900 text-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 mb-2">
                    {{ $umkm->category?->name ?? 'Tanpa Kategori' }}
                </span>
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight">{{ $umkm->name }}</h2>
                <p class="text-xs text-slate-400 mt-1">ID Sistem: #{{ $umkm->id }} • Ditambahkan: {{ $umkm->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Data
                </a>
                <a href="{{ route('public.detail', $umkm->slug) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Halaman Publik
                </a>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            <!-- Grid Foto & Ringkasan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Foto -->
                <div class="md:col-span-1">
                    @if($umkm->photo_path)
                        <img src="{{ asset('storage/' . $umkm->photo_path) }}" alt="{{ $umkm->name }}" class="w-full h-56 object-cover rounded-2xl border border-slate-200 shadow-sm">
                    @else
                        <div class="w-full h-56 rounded-2xl bg-slate-100 border border-slate-200 flex flex-col items-center justify-center text-slate-400">
                            <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-xs">Foto belum diunggah</span>
                        </div>
                    @endif
                </div>

                <!-- Info Pokok -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Deskripsi Usaha</h3>
                        <p class="text-sm text-slate-700 mt-1 leading-relaxed">{{ $umkm->description ?? 'Belum ada deskripsi yang ditambahkan.' }}</p>
                    </div>

                    <div>
                        <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Alamat Usaha</h3>
                        <p class="text-sm text-slate-800 font-medium mt-1">{{ $umkm->address }}</p>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-semibold text-slate-400 uppercase block">Skala Usaha</span>
                            <span class="text-sm font-bold text-slate-800 capitalize">{{ $umkm->business_scale }}</span>
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-semibold text-slate-400 uppercase block">Metode Penjualan</span>
                            <span class="text-sm font-bold text-slate-800 capitalize">{{ $umkm->sales_channel }}</span>
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-semibold text-slate-400 uppercase block">Kontak / Telepon</span>
                            <span class="text-sm font-bold text-slate-800">{{ $umkm->public_phone ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mini Map Titik Lokasi -->
            @if($umkm->latitude && $umkm->longitude)
                <div class="border-t border-slate-100 pt-6">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
                        Titik Koordinat Geografis ({{ $umkm->latitude }}, {{ $umkm->longitude }})
                    </h3>
                    <div id="detail-map" class="w-full h-64 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@if($umkm->latitude && $umkm->longitude)
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lat = {{ $umkm->latitude }};
            const lng = {{ $umkm->longitude }};
            const map = L.map('detail-map').setView([lat, lng], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup("<b>{{ $umkm->name }}</b><br>{{ $umkm->address }}")
                .openPopup();
        });
    </script>
    @endpush
@endif
