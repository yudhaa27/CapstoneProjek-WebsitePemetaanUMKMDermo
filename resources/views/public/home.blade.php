@extends('layouts.app')

@section('title', 'Warisan Luhur, Sentuhan Masa Depan - Batik Desa Dermo')

@section('content')
<!-- ========================================================================= -->
<!-- HERO SECTION (PERSIS SESUAI GAMBAR REFERENSI USER)                        -->
<!-- ========================================================================= -->
<section class="relative overflow-hidden pt-10 pb-16 lg:pt-16 lg:pb-24 bg-[#FAFCFF]">
    
    <!-- Geometric Intersecting Rings & Diagonal Dashed Line Background SVG -->
    <div class="absolute inset-0 pointer-events-none -z-10 overflow-hidden flex items-center justify-center">
        <svg class="w-full h-full max-w-7xl" viewBox="0 0 1200 650" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Diagonal Dashed Line -->
            <line x1="280" y1="40" x2="850" y2="480" stroke="#DBEAFE" stroke-width="1.5" stroke-dasharray="6 6" />
            
            <!-- Orbital Large Intersecting Rings centered behind Hero Photo -->
            <ellipse cx="880" cy="270" rx="310" ry="190" stroke="#E2EDF9" stroke-width="1.5" transform="rotate(-15 880 270)" />
            <ellipse cx="860" cy="280" rx="260" ry="260" stroke="#E6F0FA" stroke-width="1.5" />
            <ellipse cx="850" cy="290" rx="200" ry="140" stroke="#DBEAFE" stroke-width="1" stroke-dasharray="4 4" transform="rotate(35 850 290)" />
            
            <!-- Ambient Soft Blue Glow -->
            <circle cx="870" cy="270" r="160" fill="#EBF3FD" filter="blur(70px)" opacity="0.6" />
            <circle cx="200" cy="180" r="140" fill="#EFF6FF" filter="blur(60px)" opacity="0.5" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
            
            <!-- LEFT COLUMN: Headline, Deskripsi, Tombol Aksi -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <!-- Capsule Badge Pill -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/90 border border-slate-200/90 shadow-[0_2px_8px_-2px_rgba(0,0,0,0.05)] text-slate-700 text-[11px] font-bold tracking-wider uppercase backdrop-blur-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600 inline-block"></span>
                    <span>PORTAL RESMI UMKM DESA DERMO</span>
                </div>

                <!-- Main Display Heading (Playfair Serif Font) -->
                <h1 class="font-serif-title text-4xl sm:text-5xl lg:text-[3.65rem] font-bold text-slate-900 tracking-tight leading-[1.14]">
                    Warisan Luhur, <span class="text-[#0ea5e9] font-serif-title font-medium">Sentuhan</span><br>
                    <span class="text-[#1E56A0] font-serif-title font-bold">Masa Depan</span>: Batik Desa<br>
                    Dermo
                </h1>

                <!-- Subtitle Description (Italic, Authentic) -->
                <p class="italic text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl font-normal pt-1">
                    Menghubungkan 50+ pengrajin batik tulis dan cap tradisional ke pasar global melalui inovasi digital berkelanjutan, presisi kriya tangan, dan nilai filosofis leluhur.
                </p>

                <!-- Action Button Group -->
                <div class="flex flex-wrap items-center gap-4 pt-3">
                    <!-- Button 1: Solid Navy Pill -->
                    <a href="{{ route('public.map') }}" 
                        class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-[#1E56A0] hover:bg-[#163e75] active:bg-[#12305c] text-white font-semibold text-sm shadow-lg shadow-blue-900/15 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Lihat Peta UMKM</span>
                    </a>

                    <!-- Button 2: White Pill with Catalog Grid Icon -->
                    <a href="{{ route('public.list') }}" 
                        class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-white hover:bg-slate-50 border border-slate-200/90 text-slate-800 font-semibold text-sm shadow-sm transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-slate-800" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h7v7H4V4zm10 0h7v7h-7V4zM4 14h7v7H4v-7zm10 0h7v7h-7v-7z"/>
                        </svg>
                        <span>Katalog Batik Unggulan</span>
                    </a>
                </div>
            </div>

            <!-- RIGHT COLUMN: Visual Composition with Hero Frame & Badges -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end mt-6 lg:mt-0">
                <div class="relative w-full max-w-md sm:max-w-[460px]">
                    
                    <!-- Floating Badge TOP LEFT: Gerai -->
                    <div class="absolute -top-6 -left-4 sm:-left-8 z-20 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1E56A0] flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-extrabold text-slate-900 block leading-tight">58+ Gerai</span>
                            <span class="text-[11px] text-slate-500 font-medium block leading-tight mt-0.5">100% Pewarna Alami</span>
                        </div>
                    </div>

                    <!-- Main Frame Photo -->
                    <div class="relative rounded-[2.25rem] overflow-hidden shadow-2xl border-4 border-white bg-slate-900 group">
                        <img src="{{ asset('images/hero-artisan.jpg') }}" 
                            alt="Ibu Warsiti Pengrajin Batik Canting Tulis Klasik Desa Dermo" 
                            class="w-full h-[400px] sm:h-[450px] object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <!-- Badge Top Right Inside Photo: Ekspor -->
                        <div class="absolute top-4 right-4 z-10 bg-slate-900/80 backdrop-blur-md text-white text-[11px] font-semibold px-3 py-1.5 rounded-full border border-white/20 flex items-center gap-1.5 shadow-md">
                            <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke-width="2"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                            </svg>
                            <span>Ekspor ke 14 Negara</span>
                        </div>

                        <!-- Frosted Banner Bottom on Photo: Profil Artisan -->
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/70 to-transparent p-5 pt-14 text-white">
                            <span class="text-[10px] uppercase font-bold tracking-widest text-sky-400 block">
                                MASTER ARTISAN GIRILOYO
                            </span>
                            <span class="text-sm sm:text-base font-bold text-white block mt-0.5">
                                Ibu Warsiti • Canting Tulis Klasik
                            </span>
                        </div>
                    </div>

                    <!-- Floating Badge BOTTOM RIGHT: Rating & Ulasan -->
                    <div class="absolute -bottom-6 -right-3 sm:-right-6 z-20 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-2xl border border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#1E56A0] text-white flex items-center justify-center font-bold flex-shrink-0 shadow-md shadow-blue-600/20">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-baseline gap-1">
                                <span class="text-base font-extrabold text-slate-900 leading-none">4.98</span>
                                <span class="text-xs text-slate-400 font-medium leading-none">/ 5.0</span>
                            </div>
                            <span class="text-[10px] text-slate-500 font-medium block mt-1 leading-none">1.2k+ Ulasan Terverifikasi</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 4 STATISTIK CARDS (PERSIS SESUAI GAMBAR REFERENSI USER)                    -->
<!-- ========================================================================= -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2 mb-20 relative z-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- CARD 1: UMKM Terverifikasi -->
        <div class="bg-white p-7 rounded-[1.75rem] border border-slate-100 shadow-[0_4px_25px_-5px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-5">
                <div class="w-12 h-12 rounded-2xl bg-blue-50/90 text-[#1E56A0] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50/90 text-blue-700 text-xs font-semibold">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    +14% thn ini
                </span>
            </div>
            <div>
                <p class="font-serif-title text-4xl sm:text-[2.75rem] font-extrabold text-slate-900 tracking-tight leading-none">
                    00+
                </p>
                <h3 class="text-sm font-bold text-slate-900 mt-3">UMKM Terverifikasi</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Terintegrasi standar kualitas indikasi geografis.
                </p>
            </div>
        </div>

        <!-- CARD 2: Pengrajin Aktif -->
        <div class="bg-white p-7 rounded-[1.75rem] border border-slate-100 shadow-[0_4px_25px_-5px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-5">
                <div class="w-12 h-12 rounded-2xl bg-blue-50/90 text-[#1E56A0] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </div>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50/90 text-blue-700 text-xs font-semibold">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    70% Wanita
                </span>
            </div>
            <div>
                <p class="font-serif-title text-4xl sm:text-[2.75rem] font-extrabold text-slate-900 tracking-tight leading-none">
                    00+
                </p>
                <h3 class="text-sm font-bold text-slate-900 mt-3">Pengrajin Aktif</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Keahlian turun-temurun dari tiga generasi sentra.
                </p>
            </div>
        </div>

        <!-- CARD 3: Karya Terdokumentasi -->
        <div class="bg-white p-7 rounded-[1.75rem] border border-slate-100 shadow-[0_4px_25px_-5px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-5">
                <div class="w-12 h-12 rounded-2xl bg-blue-50/90 text-[#1E56A0] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50/90 text-blue-700 text-xs font-semibold">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Terarsip NFT/QR
                </span>
            </div>
            <div>
                <p class="font-serif-title text-4xl sm:text-[2.75rem] font-extrabold text-slate-900 tracking-tight leading-none">
                    00+
                </p>
                <h3 class="text-sm font-bold text-slate-900 mt-3">Karya Terdokumentasi</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Katalog digital dengan narasi filosofis orisinal.
                </p>
            </div>
        </div>

        <!-- CARD 4: Sentra Budaya Utama -->
        <div class="bg-white p-7 rounded-[1.75rem] border border-slate-100 shadow-[0_4px_25px_-5px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-5">
                <div class="w-12 h-12 rounded-2xl bg-blue-50/90 text-[#1E56A0] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50/90 text-blue-700 text-xs font-semibold">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    100% Terpetakan
                </span>
            </div>
            <div>
                <p class="font-serif-title text-4xl sm:text-[2.75rem] font-extrabold text-slate-900 tracking-tight leading-none">
                    o Dusun
                </p>
                <h3 class="text-sm font-bold text-slate-900 mt-3">Sentra Budaya Utama</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Nama Beberapa Dusun
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- CUPLIKAN PETA INTERAKTIF SEBELUM TAHAP KATALOG                            -->
<!-- ========================================================================= -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-[#1E56A0] uppercase tracking-wider">Pemetaan Digital GIS</span>
                <h2 class="text-2xl font-bold text-slate-900 mt-1">Peta Persebaran Lokasi UMKM Dermo</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Titik koordinat unit usaha dan sentra pengrajin di wilayah Kelurahan Dermo.</p>
            </div>
            <a href="{{ route('public.map') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#1E56A0] hover:underline">
                Buka Peta Layar Penuh &rarr;
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
