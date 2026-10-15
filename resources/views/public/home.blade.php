@extends('layouts.app')

@section('title', 'Sistem Informasi Pemetaan UMKM Kelurahan Dermo')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-900 via-slate-900 to-slate-950 text-white py-20 lg:py-28">
    <!-- Background Glow Accents -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-emerald-500/10 blur-3xl pointer-events-none rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <!-- Region Badge -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs font-semibold backdrop-blur-sm">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Kelurahan Dermo • Kecamatan Mojoroto • Kota Kediri
        </div>

        <!-- Headline -->
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight max-w-4xl mx-auto leading-tight sm:leading-none">
            Eksplorasi & Pemetaan Digital <br class="hidden sm:inline">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-sky-300">
                UMKM Kelurahan Dermo
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="text-slate-300 max-w-2xl mx-auto text-base sm:text-lg leading-relaxed font-normal">
            Sistem informasi geografis untuk mempermudah warga dan pengunjung menemukan ragam produk lokal, kuliner khas, kerajinan, dan layanan usaha di wilayah Dermo.
        </p>

        <!-- Search Bar Hero -->
        <div class="max-w-xl mx-auto pt-4">
            <form action="{{ route('public.list') }}" method="GET" class="flex flex-col sm:flex-row gap-2 bg-white/10 p-2 rounded-2xl backdrop-blur-md border border-white/10 shadow-2xl">
                <div class="relative flex-1">
                    <input type="text" name="search" placeholder="Cari tahu kuning, pecel, bengkel, toko..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-white text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <button type="submit" class="px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-sm transition shadow-lg shadow-emerald-500/30">
                    Cari UMKM
                </button>
            </form>
        </div>

        <!-- Quick CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2 text-sm font-semibold">
            <a href="{{ route('public.map') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-slate-900 hover:bg-slate-100 shadow-md transition">
                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                Buka Peta Interaktif
            </a>
            <a href="{{ route('public.list') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-800 text-slate-200 border border-slate-700 transition">
                Jelajahi Katalog Lengkap &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Stats Counters Bar -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xl p-6 sm:p-8 grid grid-cols-1 sm:grid-cols-3 gap-6 divide-y sm:divide-y-0 sm:divide-x divide-slate-100">
        <div class="text-center sm:text-left sm:px-4">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total UMKM Terdata</p>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">{{ $totalUmkm }}</p>
            <p class="text-xs text-emerald-600 font-medium mt-1">Unit usaha terdaftar di Dermo</p>
        </div>

        <div class="text-center sm:text-left sm:px-4 pt-4 sm:pt-0">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kategori Usaha</p>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">{{ $totalCategories }}</p>
            <p class="text-xs text-teal-600 font-medium mt-1">Kuliner, kerajinan, jasa, retail, dll</p>
        </div>

        <div class="text-center sm:text-left sm:px-4 pt-4 sm:pt-0">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Sistem Analisis</p>
            <p class="text-xl sm:text-2xl font-bold text-slate-900 mt-2">K-Modes & GIS</p>
            <p class="text-xs text-sky-600 font-medium mt-1">Pemetaan spasial & segmentasi</p>
        </div>
    </div>
</section>

<!-- Peta Mini Cuplikan -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Cuplikan Peta Persebaran UMKM</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Titik lokasi UMKM aktif di wilayah Kelurahan Dermo, Kota Kediri.</p>
            </div>
            <a href="{{ route('public.map') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-emerald-600 hover:text-emerald-700">
                Buka Peta Layar Penuh &rarr;
            </a>
        </div>

        <div id="home-mini-map" class="w-full h-80 sm:h-96 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
    </div>
</section>

<!-- Kategori Usaha Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
    <div class="text-center max-w-xl mx-auto mb-10">
        <h2 class="text-2xl font-bold text-slate-900">Kategori Usaha Lokal</h2>
        <p class="text-sm text-slate-500 mt-2">Pilih kategori untuk memfilter unit usaha yang ingin Anda temukan</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach($categories as $cat)
            <a href="{{ route('public.list', ['category' => $cat->id]) }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 hover:border-emerald-500 hover:shadow-lg hover:-translate-y-1 transition text-center flex flex-col items-center">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 group-hover:bg-emerald-500 text-emerald-600 group-hover:text-white flex items-center justify-center transition-colors mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <h3 class="font-bold text-sm text-slate-800 group-hover:text-emerald-600 transition">{{ $cat->name }}</h3>
                <span class="text-xs text-slate-400 mt-1 font-medium">{{ $cat->umkms_count }} Usaha</span>
            </a>
        @endforeach
    </div>
</section>

<!-- Produk & UMKM Terbaru -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 mb-20">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">UMKM Unggulan Dermo</h2>
            <p class="text-sm text-slate-500 mt-1">Rekomendasi usaha lokal yang siap melayani kebutuhan Anda</p>
        </div>
        <a href="{{ route('public.list') }}" class="text-xs sm:text-sm font-semibold text-emerald-600 hover:text-emerald-700">
            Lihat Semua ({{ $totalUmkm }}) &rarr;
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recentUmkms as $umkm)
            <div class="bg-white rounded-2xl border border-slate-200/80 hover:border-emerald-400 hover:shadow-md transition overflow-hidden flex flex-col">
                <!-- Foto Card -->
                <div class="relative h-48 bg-slate-100 overflow-hidden">
                    @if($umkm->photo_path)
                        <img src="{{ asset('storage/' . $umkm->photo_path) }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-tr from-emerald-100 to-teal-50 flex flex-col items-center justify-center text-emerald-700">
                            <span class="text-3xl font-extrabold">{{ strtoupper(substr($umkm->name, 0, 1)) }}</span>
                            <span class="text-xs mt-1 font-medium text-emerald-600">{{ $umkm->category?->name ?? 'UMKM Dermo' }}</span>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur-sm text-slate-800 shadow-sm">
                            {{ $umkm->category?->name ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-600 text-white shadow-sm uppercase tracking-wider text-[10px]">
                            Skala {{ $umkm->business_scale }}
                        </span>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-base text-slate-900 line-clamp-1 hover:text-emerald-600 transition">
                            <a href="{{ route('public.detail', $umkm->slug) }}">
                                {{ $umkm->name }}
                            </a>
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                            {{ $umkm->description ?? 'Menyediakan aneka produk dan layanan berkualitas di wilayah Kelurahan Dermo.' }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-slate-100 space-y-2 text-xs text-slate-500">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-slate-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="line-clamp-1">{{ $umkm->address }}</span>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <span class="text-slate-400 font-medium capitalize">Metode: {{ $umkm->sales_channel }}</span>
                            <a href="{{ route('public.detail', $umkm->slug) }}" class="font-semibold text-emerald-600 hover:text-emerald-700">
                                Lihat Profil &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dermoCenter = [-7.8038, 111.9861];
        const miniMap = L.map('home-mini-map').setView(dermoCenter, 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(miniMap);

        // Fetch markers from API
        fetch("{{ route('api.map.data') }}")
            .then(res => res.json())
            .then(json => {
                if (json.status === 'success' && json.data.length > 0) {
                    const bounds = [];
                    json.data.forEach(item => {
                        const marker = L.marker([item.lat, item.lng]).addTo(miniMap);
                        bounds.push([item.lat, item.lng]);
                        marker.bindPopup(`
                            <div class="p-1 text-slate-800">
                                <span class="text-[10px] font-bold uppercase text-emerald-600 tracking-wider">${item.category}</span>
                                <h4 class="font-bold text-sm text-slate-900 mt-0.5">${item.name}</h4>
                                <p class="text-xs text-slate-500 mt-1">${item.address}</p>
                                <a href="${item.detail_url}" class="mt-2 inline-block text-xs font-semibold text-emerald-600 hover:underline">Lihat Rincian Usaha &rarr;</a>
                            </div>
                        `);
                    });

                    if (bounds.length > 0) {
                        miniMap.fitBounds(bounds, { padding: [30, 30] });
                    }
                }
            })
            .catch(err => console.error("Gagal memuat data peta:", err));
    });
</script>
@endpush
