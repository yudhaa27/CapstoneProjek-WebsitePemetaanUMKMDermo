<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SIG Pemetaan UMKM Dermo</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-full flex flex-col md:flex-row">
    <!-- Sidebar Admin -->
    <aside class="w-full md:w-64 bg-slate-900 text-slate-200 flex-shrink-0 flex flex-col justify-between border-r border-slate-800">
        <div>
            <!-- Header Brand -->
            <div class="h-16 px-6 flex items-center justify-between border-b border-slate-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white font-bold text-sm">
                        AD
                    </div>
                    <div>
                        <span class="font-bold text-white tracking-tight text-sm block">Admin SIG Dermo</span>
                        <span class="text-[11px] text-emerald-400 block font-medium">Kelurahan Dermo</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm">
                <div class="px-3 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Menu Utama
                </div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white font-semibold' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.umkm.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.umkm.*') ? 'bg-emerald-600 text-white font-semibold' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Manajemen UMKM
                </a>

                <div class="pt-4 px-3 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Sistem & Akses Cepat
                </div>
                <a href="{{ route('public.map') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        Lihat Peta Publik
                    </span>
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <a href="{{ route('public.home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        Lihat Web Publik
                    </span>
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </nav>
        </div>

        <!-- Sidebar User Footer -->
        <div class="p-4 border-t border-slate-800 bg-slate-950/40">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="w-9 h-9 rounded-full bg-slate-700 flex items-center justify-center font-bold text-white text-xs">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@dermo.id' }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-400 hover:bg-slate-800 rounded-lg transition" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Workspace -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <!-- Topbar -->
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between sticky top-0 z-40">
            <h1 class="text-lg font-bold text-slate-800">
                @yield('page_title', 'Panel Pengelolaan')
            </h1>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.umkm.create') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-sm font-semibold bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah UMKM
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-6 pt-6">
            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 shadow-sm mb-4">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 flex items-center gap-3 shadow-sm mb-4">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 shadow-sm mb-4">
                    <p class="text-sm font-semibold mb-1">Harap periksa kembali input Anda:</p>
                    <ul class="list-disc list-inside text-xs space-y-0.5 text-amber-800">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Body Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
