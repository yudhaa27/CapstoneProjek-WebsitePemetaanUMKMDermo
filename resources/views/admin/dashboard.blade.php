@extends('layouts.admin')

@section('title', 'Dashboard Pengelola')
@section('page_title', 'Ringkasan Sistem & Statistik')

@section('content')
<div class="space-y-6">
    <!-- Stat Counters Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Stat 1 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total UMKM</p>
                <p class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalUmkm }}</p>
                <p class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                    <span class="text-emerald-600 font-semibold">Tercatat</span> dalam basis data
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Publikasi Aktif</p>
                <p class="text-3xl font-extrabold text-emerald-600 mt-1">{{ $publishedCount }}</p>
                <p class="text-xs text-slate-500 mt-1">Tayang di peta & katalog</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Stat 3 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Titik Koordinat</p>
                <p class="text-3xl font-extrabold text-sky-600 mt-1">{{ $withCoordsCount }}</p>
                <p class="text-xs text-slate-500 mt-1">Memiliki koordinat GPS</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
        </div>

        <!-- Stat 4 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Perlu Dilengkapi</p>
                <p class="text-3xl font-extrabold text-amber-600 mt-1">{{ $draftCount + ($totalUmkm - $withCoordsCount) }}</p>
                <p class="text-xs text-slate-500 mt-1">Draf atau tanpa titik peta</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
        </div>
    </div>

    <!-- 2 Column Section: Skala Usaha & Kategori -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Card 1: Distribusi Skala Usaha -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h2 class="text-base font-bold text-slate-900 mb-4">Distribusi Skala Usaha</h2>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Usaha Mikro</span>
                        <span class="text-slate-900">{{ $scaleCounts['mikro'] }} Unit</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-emerald-500 h-2.5 rounded-full" style="width: {{ $totalUmkm > 0 ? ($scaleCounts['mikro'] / $totalUmkm) * 100 : 0 }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Usaha Kecil</span>
                        <span class="text-slate-900">{{ $scaleCounts['kecil'] }} Unit</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-teal-500 h-2.5 rounded-full" style="width: {{ $totalUmkm > 0 ? ($scaleCounts['kecil'] / $totalUmkm) * 100 : 0 }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>Usaha Menengah</span>
                        <span class="text-slate-900">{{ $scaleCounts['menengah'] }} Unit</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-indigo-500 h-2.5 rounded-full" style="width: {{ $totalUmkm > 0 ? ($scaleCounts['menengah'] / $totalUmkm) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Notice K-Modes (Sesuai Panduan) -->
            <div class="mt-6 p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600">
                <span class="font-semibold text-slate-800 block mb-1">💡 Catatan K-Modes (Iterasi 4):</span>
                Variabel kategorikal seperti skala usaha, kategori, dan metode penjualan akan menjadi atribut masukan algoritma clustering.
            </div>
        </div>

        <!-- Card 2: Kategori Usaha -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h2 class="text-base font-bold text-slate-900 mb-4">Sebaran Kategori Usaha di Kelurahan Dermo</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($categories as $category)
                    <div class="p-3.5 rounded-xl border border-slate-200/80 hover:border-emerald-300 hover:bg-emerald-50/30 transition flex items-center justify-between">
                        <div class="overflow-hidden">
                            <p class="font-semibold text-sm text-slate-800 truncate">{{ $category->name }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ $category->description ?? 'Tidak ada deskripsi' }}</p>
                        </div>
                        <span class="ml-3 px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                            {{ $category->umkms_count }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent UMKM Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">Data UMKM Terbaru</h2>
                <p class="text-xs text-slate-500 mt-0.5">Daftar entri usaha yang baru ditambahkan ke sistem</p>
            </div>
            <a href="{{ route('admin.umkm.index') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">
                Lihat Semua UMKM &rarr;
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 font-semibold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Nama Usaha</th>
                        <th class="px-6 py-3.5">Kategori</th>
                        <th class="px-6 py-3.5">Skala / Kanal</th>
                        <th class="px-6 py-3.5">Status Titik</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($latestUmkms as $item)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="px-6 py-4 font-semibold text-slate-900">
                                {{ $item->name }}
                                <span class="block text-xs font-normal text-slate-500 truncate max-w-xs">{{ $item->address }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700">
                                    {{ $item->category?->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="capitalize font-semibold text-slate-700">{{ $item->business_scale }}</span>
                                <span class="text-slate-400">•</span>
                                <span class="capitalize text-slate-500">{{ $item->sales_channel }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->latitude && $item->longitude)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Ada Koordinat
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Belum Ada Titik
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.umkm.edit', $item->id) }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-800">
                                    Edit
                                </a>
                                <a href="{{ route('admin.umkm.show', $item->id) }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-400 text-sm">
                                Belum ada data UMKM yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
