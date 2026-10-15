<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pemetaan UMKM Kelurahan Dermo') - Sistem Informasi Geografis</title>
    <meta name="description" content="Sistem Informasi Pemetaan dan Direktori UMKM Kelurahan Dermo, Kecamatan Mojoroto, Kota Kediri.">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800 antialiased">
    <!-- Navbar Publik -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand / Logo -->
                <a href="{{ route('public.home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center text-white shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-lg font-bold text-slate-900 tracking-tight block leading-tight">UMKM Dermo</span>
                        <span class="text-xs font-medium text-emerald-600 block leading-none">Kel. Dermo • Kota Kediri</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-1">
                    <a href="{{ route('public.home') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('public.home') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        Beranda
                    </a>
                    <a href="{{ route('public.map') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('public.map') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        Peta Persebaran
                    </a>
                    <a href="{{ route('public.list') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('public.list*') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        Daftar UMKM
                    </a>
                </nav>

                <!-- Auth / Admin Portal CTA -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            Panel Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:text-slate-900 hover:bg-slate-100 border border-slate-300 transition">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Login Pengelola
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <!-- Mobile Navigation Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 py-3 space-y-1">
                <a href="{{ route('public.home') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-100">Beranda</a>
                <a href="{{ route('public.map') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-100">Peta Persebaran</a>
                <a href="{{ route('public.list') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-100">Daftar UMKM</a>
                <div class="pt-2 border-t border-slate-200">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-emerald-600 hover:bg-emerald-50">Panel Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-100">Login Pengelola</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Content Area -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Col 1: About -->
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-emerald-600 flex items-center justify-center text-white font-bold">
                            D
                        </div>
                        <span class="text-lg font-bold text-white tracking-tight">SIG Pemetaan UMKM Dermo</span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-md leading-relaxed">
                        Sistem informasi geografis untuk mendokumentasikan, memetakan persebaran lokasi, serta mendukung analisis pengelompokan UMKM di Kelurahan Dermo, Kecamatan Mojoroto, Kota Kediri.
                    </p>
                    <p class="text-xs text-slate-500">
                        Proyek Capstone • Laravel 12 + PostgreSQL + Leaflet + Python K-Modes
                    </p>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-3">Navigasi</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('public.home') }}" class="hover:text-white transition">Beranda Utama</a></li>
                        <li><a href="{{ route('public.map') }}" class="hover:text-white transition">Peta Interaktif</a></li>
                        <li><a href="{{ route('public.list') }}" class="hover:text-white transition">Katalog UMKM</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Login Pengelola</a></li>
                    </ul>
                </div>

                <!-- Col 3: Wilayah Kerja -->
                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-3">Wilayah Kerja</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Kantor Kelurahan Dermo<br>
                        Kecamatan Mojoroto<br>
                        Kota Kediri, Jawa Timur<br>
                        Indonesia
                    </p>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Sistem Informasi Pemetaan UMKM Kelurahan Dermo. Seluruh hak cipta dilindungi.</p>
                <p class="mt-2 sm:mt-0">Dibuat untuk kebutuhan pemetaan & pemberdayaan ekonomi lokal.</p>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
