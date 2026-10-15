@extends('layouts.app')

@section('title', $umkm->name . ' - UMKM Kelurahan Dermo')

@section('content')
<!-- Breadcrumbs -->
<div class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
        <nav class="flex items-center gap-2 text-xs text-slate-500">
            <a href="{{ route('public.home') }}" class="hover:text-emerald-600 transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('public.list') }}" class="hover:text-emerald-600 transition">Katalog UMKM</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate">{{ $umkm->name }}</span>
        </nav>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">
    <!-- Main Detail Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
            <!-- Left Col: Photo -->
            <div class="lg:col-span-5 relative bg-slate-900 min-h-[320px] lg:min-h-full">
                @if($umkm->photo_path)
                    <img src="{{ asset('storage/' . $umkm->photo_path) }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-tr from-slate-900 via-emerald-950 to-slate-900 flex flex-col items-center justify-center text-white p-8 text-center">
                        <div class="w-20 h-20 rounded-2xl bg-white/10 flex items-center justify-center text-4xl font-extrabold mb-3 text-emerald-400">
                            {{ strtoupper(substr($umkm->name, 0, 1)) }}
                        </div>
                        <span class="text-sm font-semibold text-emerald-300">{{ $umkm->category?->name ?? 'UMKM Dermo' }}</span>
                        <span class="text-xs text-slate-400 mt-1">Kelurahan Dermo, Kota Kediri</span>
                    </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/95 backdrop-blur-md text-slate-900 shadow">
                        {{ $umkm->category?->name ?? 'Kategori Umum' }}
                    </span>
                </div>
            </div>

            <!-- Right Col: Information & Actions -->
            <div class="lg:col-span-7 p-6 sm:p-10 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider">
                            Skala: {{ $umkm->business_scale }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-teal-50 text-teal-700 border border-teal-200 capitalize">
                            Penjualan: {{ $umkm->sales_channel }}
                        </span>
                        @if($umkm->latestClusterAssignment)
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                {{ $umkm->latestClusterAssignment->cluster_label }}
                            </span>
                        @endif
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $umkm->name }}</h1>

                    <div class="text-sm text-slate-600 leading-relaxed space-y-2">
                        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Tentang Usaha / Produk</h2>
                        <p>{{ $umkm->description ?? 'Unit usaha warga Kelurahan Dermo yang berkomitmen memberikan kualitas terbaik.' }}</p>
                    </div>

                    <!-- Detail Spec Box -->
                    <div class="pt-4 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 font-semibold block uppercase text-[10px]">Alamat Usaha</span>
                            <span class="text-slate-800 font-medium mt-1 block leading-relaxed">{{ $umkm->address }}</span>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-slate-400 font-semibold block uppercase text-[10px]">Kontak / Telepon</span>
                            <span class="text-slate-800 font-bold mt-1 block text-sm">{{ $umkm->public_phone ?? 'Tidak dicantumkan' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                    @if($umkm->public_phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->public_phone) }}?text=Halo%20{{ urlencode($umkm->name) }},%20saya%20melihat%20usaha%20Anda%20di%20Sistem%20Informasi%20Pemetaan%20UMKM%20Kelurahan%20Dermo." target="_blank"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm shadow-md shadow-emerald-600/20 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            Hubungi via WhatsApp
                        </a>
                    @endif

                    <a href="{{ route('public.map') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 font-semibold text-sm transition">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        Buka di Peta Wilayah
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Peta Lokasi Interaktif -->
    @if($umkm->latitude && $umkm->longitude)
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Lokasi Geografis Pada Peta</h2>
                    <p class="text-xs text-slate-500">Koordinat: {{ $umkm->latitude }}, {{ $umkm->longitude }} (Kelurahan Dermo, Kec. Mojoroto)</p>
                </div>
                <a href="https://www.google.com/maps/search/?api=1&query={{ $umkm->latitude }},{{ $umkm->longitude }}" target="_blank"
                    class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                    Buka Google Maps &rarr;
                </a>
            </div>
            <div id="umkm-location-map" class="w-full h-80 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
        </div>
    @endif

    <!-- UMKM Terkait dalam Kategori Sama -->
    @if($relatedUmkms->count() > 0)
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-900">Usaha Serupa di Kelurahan Dermo</h2>
                <a href="{{ route('public.list', ['category' => $umkm->category_id]) }}" class="text-xs font-semibold text-emerald-600 hover:underline">
                    Lihat Kategori Ini &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($relatedUmkms as $rel)
                    <a href="{{ route('public.detail', $rel->slug) }}" class="group bg-white p-5 rounded-2xl border border-slate-200 hover:border-emerald-400 hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600">{{ $rel->category?->name }}</span>
                            <h3 class="font-bold text-sm text-slate-900 group-hover:text-emerald-600 transition mt-1">{{ $rel->name }}</h3>
                            <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $rel->description ?? $rel->address }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 capitalize">Skala: {{ $rel->business_scale }}</span>
                            <span class="font-semibold text-emerald-600 group-hover:translate-x-0.5 transition-transform">Detail &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection

@if($umkm->latitude && $umkm->longitude)
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lat = {{ $umkm->latitude }};
            const lng = {{ $umkm->longitude }};
            const map = L.map('umkm-location-map').setView([lat, lng], 16);

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
