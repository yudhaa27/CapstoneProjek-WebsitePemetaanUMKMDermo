@extends('layouts.admin')

@section('title', 'Tambah UMKM Baru')
@section('page_title', 'Form Tambah Data UMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="border-b border-slate-100 pb-4 mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">Identitas & Informasi Usaha</h2>
                <p class="text-xs text-slate-500">Lengkapi formulir profil UMKM untuk pencatatan dan pemetaan wilayah Kelurahan Dermo</p>
            </div>
            <a href="{{ route('admin.umkm.index') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800 transition">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Baris 1: Nama Usaha & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Nama Usaha / Merk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        placeholder="Contoh: Tahu Kuning Dermo Barokah"
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kategori Usaha <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Baris 2: Deskripsi Usaha -->
            <div>
                <label for="description" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                    Deskripsi Produk / Usaha
                </label>
                <textarea name="description" id="description" rows="3"
                    placeholder="Jelaskan produk unggulan, keunikan, jam buka, atau profil singkat usaha..."
                    class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">{{ old('description') }}</textarea>
            </div>

            <!-- Baris 3: Alamat Lengkap -->
            <div>
                <label for="address" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea name="address" id="address" rows="2" required
                    placeholder="Contoh: Jl. Dermo Permai RT 03 / RW 01, Kelurahan Dermo, Kec. Mojoroto..."
                    class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">{{ old('address') }}</textarea>
            </div>

            <!-- Baris 4: Atribut Kategorikal (Kandidat K-Modes) -->
            <div class="p-5 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                <h3 class="text-xs font-bold uppercase tracking-wider text-emerald-900 mb-1">
                    Atribut Karakteristik (Kandidat Variabel K-Modes)
                </h3>
                <p class="text-xs text-emerald-700 mb-4">Data kategorikal baku untuk analisis segmentasi & pengelompokan usaha.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Skala Usaha -->
                    <div>
                        <label for="business_scale" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Skala Usaha <span class="text-red-500">*</span>
                        </label>
                        <select name="business_scale" id="business_scale" required
                            class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                            <option value="mikro" {{ old('business_scale', 'mikro') == 'mikro' ? 'selected' : '' }}>Usaha Mikro (Aset &lt; 50 Juta / Omzet &lt; 300 Jt)</option>
                            <option value="kecil" {{ old('business_scale') == 'kecil' ? 'selected' : '' }}>Usaha Kecil (Aset 50-500 Juta / Omzet 300 Jt - 2,5 M)</option>
                            <option value="menengah" {{ old('business_scale') == 'menengah' ? 'selected' : '' }}>Usaha Menengah (&gt; 500 Juta)</option>
                        </select>
                    </div>

                    <!-- Saluran Penjualan -->
                    <div>
                        <label for="sales_channel" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Metode / Saluran Penjualan <span class="text-red-500">*</span>
                        </label>
                        <select name="sales_channel" id="sales_channel" required
                            class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                            <option value="offline" {{ old('sales_channel', 'offline') == 'offline' ? 'selected' : '' }}>Hanya Offline / Lapak Fisik</option>
                            <option value="online" {{ old('sales_channel') == 'online' ? 'selected' : '' }}>Hanya Online (Medsos, Marketplace, WhatsApp)</option>
                            <option value="gabungan" {{ old('sales_channel') == 'gabungan' ? 'selected' : '' }}>Gabungan (Toko Fisik & Online)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Baris 5: Kontak & Status Publikasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label for="public_phone" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        No. Telepon / WhatsApp
                    </label>
                    <input type="text" name="public_phone" id="public_phone" value="{{ old('public_phone') }}"
                        placeholder="Contoh: 081234567890"
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                </div>

                <div>
                    <label for="status" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Status Publikasi <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Langsung Publikasikan</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draf</option>
                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                    </select>
                </div>

                <div>
                    <label for="photo" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Foto Usaha / Produk (Maks 3MB)
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                </div>
            </div>

            <!-- Baris 6: Peta Titik Koordinat Interaktif -->
            <div class="border-t border-slate-100 pt-6">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Titik Koordinat Lokasi Peta</h3>
                        <p class="text-xs text-slate-500">Klik langsung pada peta di bawah untuk menentukan titik lokasi UMKM secara otomatis.</p>
                    </div>
                    <button type="button" id="btn-use-kelurahan" class="text-xs px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium transition">
                        Pusatkan ke Dermo
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="latitude" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Latitude</label>
                        <input type="number" step="any" name="latitude" id="latitude" value="{{ old('latitude', -7.8034) }}"
                            class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                    <div>
                        <label for="longitude" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Longitude</label>
                        <input type="number" step="any" name="longitude" id="longitude" value="{{ old('longitude', 111.9861) }}"
                            class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                </div>

                <!-- Leaflet Map Container -->
                <div id="picker-map" class="w-full h-72 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
            </div>

            <!-- Submit Button Bar -->
            <div class="border-t border-slate-100 pt-6 flex items-center justify-end gap-3">
                <a href="{{ route('admin.umkm.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-md shadow-emerald-500/20 transition">
                    Simpan Data UMKM
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const defaultLat = parseFloat(document.getElementById('latitude').value) || -7.8034;
        const defaultLng = parseFloat(document.getElementById('longitude').value) || 111.9861;

        // Initialize Map
        const map = L.map('picker-map').setView([defaultLat, defaultLng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        function updateInputs(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
        }

        // On map click
        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateInputs(e.latlng.lat, e.latlng.lng);
        });

        // On marker drag
        marker.on('dragend', function (e) {
            const pos = marker.getLatLng();
            updateInputs(pos.lat, pos.lng);
        });

        // Reset to center
        document.getElementById('btn-use-kelurahan').addEventListener('click', function () {
            const dermoCenter = [-7.80345, 111.98612];
            map.setView(dermoCenter, 16);
            marker.setLatLng(dermoCenter);
            updateInputs(dermoCenter[0], dermoCenter[1]);
        });
    });
</script>
@endpush
