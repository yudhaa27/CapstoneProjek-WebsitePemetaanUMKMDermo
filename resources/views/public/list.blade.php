@extends('layouts.app')

@section('title', 'Katalog & Direktori UMKM Kelurahan Dermo')

@section('content')
<div class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Direktori Bisnis Lokal</span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Daftar UMKM Kelurahan Dermo</h1>
            <p class="text-sm text-slate-500 mt-2">Temukan produk, jasa, olahan pangan, dan sentra kerajinan karya warga Kelurahan Dermo, Kota Kediri.</p>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('public.list') }}" class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="lg:col-span-2">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama UMKM, produk, atau alamat..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <div>
                <select name="category" class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }} ({{ $cat->umkms_count }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-2">
                <select name="scale" class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    <option value="">Semua Skala</option>
                    <option value="mikro" {{ request('scale') == 'mikro' ? 'selected' : '' }}>Mikro</option>
                    <option value="kecil" {{ request('scale') == 'kecil' ? 'selected' : '' }}>Kecil</option>
                    <option value="menengah" {{ request('scale') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                </select>

                <button type="submit" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                    Cari
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Main Cards List -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs text-slate-500">
            Menampilkan <span class="font-bold text-slate-800">{{ $umkms->total() }}</span> unit usaha terdaftar
        </p>

        <a href="{{ route('public.map') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 hover:text-emerald-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
            Tampilkan dalam Peta Interaktif
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($umkms as $umkm)
            <div class="bg-white rounded-2xl border border-slate-200/80 hover:border-emerald-400 hover:shadow-lg transition overflow-hidden flex flex-col group">
                <div class="relative h-48 bg-slate-100 overflow-hidden">
                    @if($umkm->photo_path)
                        <img src="{{ asset('storage/' . $umkm->photo_path) }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-tr from-slate-100 to-emerald-50 flex flex-col items-center justify-center text-emerald-700">
                            <span class="text-3xl font-extrabold">{{ strtoupper(substr($umkm->name, 0, 1)) }}</span>
                            <span class="text-xs mt-1 font-medium text-emerald-600">{{ $umkm->category?->name ?? 'UMKM Dermo' }}</span>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-white/95 backdrop-blur-sm text-slate-800 shadow-sm">
                            {{ $umkm->category?->name ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-600 text-white shadow-sm uppercase">
                            {{ $umkm->business_scale }}
                        </span>
                    </div>
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h2 class="font-bold text-base text-slate-900 group-hover:text-emerald-600 transition line-clamp-1">
                            <a href="{{ route('public.detail', $umkm->slug) }}">
                                {{ $umkm->name }}
                            </a>
                        </h2>
                        <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                            {{ $umkm->description ?? 'Unit usaha warga Kelurahan Dermo dengan produk dan pelayanan unggulan.' }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-slate-100 space-y-2 text-xs text-slate-500">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-slate-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="line-clamp-1">{{ $umkm->address }}</span>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            @if($umkm->public_phone)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->public_phone) }}" target="_blank" class="inline-flex items-center gap-1 text-emerald-600 hover:text-emerald-700 font-semibold">
                                    <span>WhatsApp</span>
                                </a>
                            @else
                                <span class="text-slate-400">Offline</span>
                            @endif

                            <a href="{{ route('public.detail', $umkm->slug) }}" class="font-semibold text-slate-700 hover:text-emerald-600">
                                Rincian & Peta &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h3 class="text-base font-bold text-slate-800">Tidak ada UMKM yang ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci lain atau bersihkan filter pencarian.</p>
                <a href="{{ route('public.list') }}" class="mt-4 inline-block px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700">
                    Tampilkan Semua UMKM
                </a>
            </div>
        @endforelse
    </div>

    @if($umkms->hasPages())
        <div class="mt-10">
            {{ $umkms->links() }}
        </div>
    @endif
</div>
@endsection
