@extends('layouts.app')

@section('title', 'Warisan Luhur, Sentuhan Masa Depan - UMKM Kelurahan Dermo')

@section('content')
<!-- ========================================================================= -->
<!-- TAHAP 1: HERO SECTION & STATISTIK UNGGULAN (Sesuai Referensi Desain)      -->
<!-- ========================================================================= -->
<section class="relative overflow-hidden pt-8 pb-16 lg:pt-14 lg:pb-24 bg-gradient-to-b from-blue-50/60 via-slate-50/30 to-white">
    <!-- Subtle Ambient Radial Glows -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute top-1/3 left-10 w-72 h-72 bg-sky-200/25 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- LEFT COLUMN: Headline & CTA -->
            <div class="lg:col-span-7 space-y-7 text-left">
                <!-- Badge Pill -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-700 text-xs font-bold tracking-wide uppercase shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    Potensi & Pemetaan Geografis UMKM
                </div>

                <!-- Main Display Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.12]">
                    Warisan Luhur, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-500">
                        Sentuhan Masa Depan:
                    </span> <br>
                    Potensi UMKM Dermo
                </h1>

                <!-- Subtitle / Deskripsi -->
                <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
                    Pusat dokumentasi terstruktur, pemetaan geografis digital, dan katalog karya warga Kelurahan Dermo, Kecamatan Mojoroto, Kota Kediri. Menghubungkan tradisi lokal dengan kemudahan teknologi masa kini.
                </p>

                <!-- Dual Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('public.map') }}" 
                        class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm shadow-xl shadow-blue-600/25 hover:shadow-blue-600/35 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Buka Peta Interaktif
                    </a>

                    <a href="{{ route('public.list') }}" 
                        class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full bg-white hover:bg-slate-50 border border-slate-300 text-slate-800 font-semibold text-sm shadow-sm hover:shadow transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Jelajahi Katalog UMKM
                    </a>
                </div>
            </div>

            <!-- RIGHT COLUMN: Visual Composition with Geometric Rings & Floating Badges -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end">
                <!-- Geometric Orbital Lines (SVG Background) -->
                <svg class="absolute -top-10 -right-10 w-[125%] h-[125%] max-w-[540px] text-blue-200/50 pointer-events-none -z-10 animate-spin-slow" viewBox="0 0 400 400" fill="none">
                    <circle cx="200" cy="200" r="140" stroke="currentColor" stroke-width="1.2" stroke-dasharray="4 4" />
                    <circle cx="200" cy="200" r="185" stroke="currentColor" stroke-width="1" />
                    <circle cx="200" cy="200" r="95" stroke="currentColor" stroke-width="1" stroke-dasharray="2 3" opacity="0.6"/>
                    <ellipse cx="200" cy="200" rx="190" ry="120" stroke="currentColor" stroke-width="1.2" transform="rotate(-25 200 200)" opacity="0.5"/>
                </svg>

                <div class="relative w-full max-w-md sm:max-w-lg">
                    <!-- Main Frame Image -->
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white bg-slate-900 group">
                        <img src="https://images.unsplash.com/photo-1590402494682-cd3fb53b1f70?auto=format&fit=crop&w=900&q=80" 
                            alt="Pengrajin & Pelaku Usaha Dermo" 
                            class="w-full h-[420px] sm:h-[460px] object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <!-- Gradient Overlay Bottom -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/10"></div>
                    </div>

                    <!-- Floating Badge TOP RIGHT: Status Sentra Aktif -->
                    <div class="absolute -top-4 -right-2 sm:-right-4 bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce-slight">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-900 block leading-tight">Sentra Aktif Dermo</span>
                            <span class="text-[11px] text-slate-500 font-medium block leading-none mt-0.5">Kecamatan Mojoroto</span>
                        </div>
                    </div>

                    <!-- Floating Badge LEFT MIDDLE: Rating / Rekomendasi -->
                    <div class="absolute top-1/2 -left-4 sm:-left-6 -translate-y-1/2 bg-white/95 backdrop-blur-md px-3.5 py-2.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center text-sm font-bold">
                            ★
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">4.9 / 5.0</span>
                            <span class="text-[10px] text-slate-500 font-medium block">Kepuasan Pengunjung</span>
                        </div>
                    </div>

                    <!-- Floating Card BOTTOM: Lokasi & Kategori -->
                    <div class="absolute -bottom-5 left-4 right-4 sm:left-6 sm:right-6 bg-slate-900/90 backdrop-blur-md text-white p-4 rounded-2xl shadow-2xl border border-slate-700 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <div class="w-9 h-9 rounded-xl bg-blue-600/30 border border-blue-500/40 text-blue-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-xs font-bold text-white truncate">Sentra Kuliner, Kerajinan & Jasa</p>
                                <p class="text-[11px] text-slate-300 truncate">Kelurahan Dermo, Kota Kediri</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-500 text-white text-[10px] font-bold tracking-wider uppercase flex-shrink-0">
                            Aktif
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 4 STATISTIK HIGHLIGHT CARDS (Persis Seperti Gambar Referensi)              -->
<!-- ========================================================================= -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-4 mb-20 relative z-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Card 1: Total UMKM -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-300 transition duration-200 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-full">
                    Terdata
                </span>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ max($totalUmkm, 50) }}+
                </p>
                <h3 class="text-sm font-bold text-slate-800 mt-1">UMKM Terdata</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Unit usaha aktif warga terdaftar dan terverifikasi di basis data kelurahan.
                </p>
            </div>
        </div>

        <!-- Card 2: Kategori Usaha -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-300 transition duration-200 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 group-hover:bg-sky-600 group-hover:text-white transition flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-sky-600 bg-sky-50 px-2.5 py-0.5 rounded-full">
                    Sektor
                </span>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ max($totalCategories, 5) }}+
                </p>
                <h3 class="text-sm font-bold text-slate-800 mt-1">Kategori Usaha</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Mencakup olahan kuliner, kerajinan, jasa, retail, dan produksi lokal.
                </p>
            </div>
        </div>

        <!-- Card 3: Terpetakan Spasial -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-300 transition duration-200 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-indigo-600 bg-indigo-50 px-2.5 py-0.5 rounded-full">
                    GIS Akurat
                </span>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    100%
                </p>
                <h3 class="text-sm font-bold text-slate-800 mt-1">Terpetakan Spasial</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Titik koordinat presisi langsung terkoneksi peta interaktif Leaflet.
                </p>
            </div>
        </div>

        <!-- Card 4: Wilayah Kelurahan -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-300 transition duration-200 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                    Wilayah
                </span>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    6 RW
                </p>
                <h3 class="text-sm font-bold text-slate-800 mt-1">Kelurahan Dermo</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Cakupan seluruh lingkungan RT/RW di wilayah Kec. Mojoroto, Kota Kediri.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- TAHAP BERIKUTNYA YANG AKAN DILENGKAPI: KATALOG, PETA GIS, PROSES, PROFIL  -->
<!-- ========================================================================= -->

<!-- Quick Teaser Peta Interaktif -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Pemetaan Digital</span>
                <h2 class="text-2xl font-bold text-slate-900 mt-1">Peta Interaktif Sebaran UMKM</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Eksplorasi posisi geografis unit usaha di Kelurahan Dermo secara langsung.</p>
            </div>
            <a href="{{ route('public.map') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700">
                Buka Peta Penuh &rarr;
            </a>
        </div>

        <div id="home-mini-map" class="w-full h-80 sm:h-96 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
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
                                <span class="text-[10px] font-bold uppercase text-blue-600 tracking-wider">${item.category}</span>
                                <h4 class="font-bold text-sm text-slate-900 mt-0.5">${item.name}</h4>
                                <p class="text-xs text-slate-500 mt-1">${item.address}</p>
                                <a href="${item.detail_url}" class="mt-2 inline-block text-xs font-semibold text-blue-600 hover:underline">Lihat Rincian Usaha &rarr;</a>
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
