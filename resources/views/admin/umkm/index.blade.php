@extends('layouts.admin')

@section('title', 'Manajemen Data UMKM')
@section('page_title', 'Daftar & Pengelolaan UMKM Kelurahan Dermo')

@section('content')
<div class="space-y-6">
    <!-- Header Tools: Search & Filter -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
        <form method="GET" action="{{ route('admin.umkm.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <!-- Search Keyword -->
            <div class="lg:col-span-2">
                <label for="search" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Pencarian</label>
                <div class="relative">
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari nama UMKM atau alamat..."
                        class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <!-- Filter Kategori -->
            <div>
                <label for="category" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Kategori</label>
                <select name="category" id="category" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Status & Action -->
            <div class="flex items-end gap-2">
                <div class="flex-1">
                    <label for="status" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Status</label>
                    <select name="status" id="status" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                        <option value="">Semua Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Terpublikasi</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draf</option>
                        <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-900 text-white text-sm font-semibold transition">
                    Filter
                </button>
                @if(request()->anyFilled(['search', 'category', 'status']))
                    <a href="{{ route('admin.umkm.index') }}" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition" title="Reset Filter">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Main Data Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 font-semibold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Usaha & Alamat</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Skala / Kanal</th>
                        <th class="px-6 py-4">Koordinat Peta</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($umkms as $item)
                        <tr class="hover:bg-slate-50/70 transition">
                            <!-- Nama Usaha & Kontak -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($item->photo_path)
                                        <img src="{{ asset('storage/' . $item->photo_path) }}" alt="{{ $item->name }}" class="w-11 h-11 rounded-lg object-cover border border-slate-200">
                                    @else
                                        <div class="w-11 h-11 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm border border-emerald-100">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('admin.umkm.show', $item->id) }}" class="font-bold text-slate-900 hover:text-emerald-600 transition">
                                            {{ $item->name }}
                                        </a>
                                        <p class="text-xs text-slate-500 truncate max-w-xs">{{ $item->address }}</p>
                                        @if($item->public_phone)
                                            <span class="text-[11px] text-slate-400">Telp: {{ $item->public_phone }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Kategori -->
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                    {{ $item->category?->name ?? 'Belum Ditentukan' }}
                                </span>
                            </td>

                            <!-- Skala & Metode Penjualan -->
                            <td class="px-6 py-4 text-xs">
                                <p class="font-semibold text-slate-800 capitalize">{{ $item->business_scale }}</p>
                                <p class="text-slate-400 capitalize">{{ $item->sales_channel }}</p>
                            </td>

                            <!-- Koordinat Peta -->
                            <td class="px-6 py-4 text-xs font-mono">
                                @if($item->latitude && $item->longitude)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        {{ number_format($item->latitude, 4) }}, {{ number_format($item->longitude, 4) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Kosong
                                    </span>
                                @endif
                            </td>

                            <!-- Status Publikasi -->
                            <td class="px-6 py-4">
                                @if($item->status === 'published')
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                        Publik
                                    </span>
                                @elseif($item->status === 'draft')
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                        Draf
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-200 text-slate-700">
                                        Arsip
                                    </span>
                                @endif
                            </td>

                            <!-- Tombol Aksi -->
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <a href="{{ route('admin.umkm.show', $item->id) }}" class="p-1.5 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition" title="Lihat Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.umkm.edit', $item->id) }}" class="p-1.5 text-emerald-600 hover:text-emerald-800 hover:bg-emerald-50 rounded-lg transition" title="Edit Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data UMKM {{ $item->name }}? Tindakan ini tidak dapat dibatalkan.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition" title="Hapus Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-sm font-medium text-slate-600">Tidak ada data UMKM yang cocok dengan filter atau pencarian Anda.</p>
                                <a href="{{ route('admin.umkm.create') }}" class="mt-3 inline-flex items-center gap-2 text-xs font-semibold text-emerald-600 hover:underline">
                                    + Tambah UMKM Baru
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($umkms->hasPages())
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
                {{ $umkms->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
