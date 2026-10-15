@extends('layouts.admin')

@section('title', 'Edit UMKM: ' . $umkm->name)
@section('page_title', 'Perbarui Data UMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="border-b border-slate-100 pb-4 mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">Perbarui Profil UMKM</h2>
                <p class="text-xs text-slate-500">Ubah data profil, status publikasi, atau perbarui titik koordinat lokasi</p>
            </div>
            <a href="{{ route('admin.umkm.index') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800 transition">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Baris 1: Nama Usaha & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Nama Usaha / Merk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $umkm->name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kategori Usaha <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $umkm->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Baris 2: Deskripsi Usaha -->
            <div>
                <label for="description" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                    Deskripsi Usaha
                </label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">{{ old('description', $umkm->description) }}</textarea>
            </div>

            <!-- Baris 3: Alamat Lengkap -->
            <div>
                <label for="address" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea name="address" id="address" rows="2" required
                    class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">{{ old('address', $umkm->address) }}</textarea>
            </div>

            <!-- Baris 4: Atribut Kategori K-Modes -->
            <div class="p-5 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                <h3 class="text-xs font-bold uppercase tracking-wider text-emerald-900 mb-1">
                    Atribut Karakteristik (Variabel K-Modes)
                </h3>
                <p class="text-xs text-emerald-700 mb-4">Pastikan data kategorikal ini diisi konsisten.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="business_scale" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Skala Usaha <span class="text-red-500">*</span>
                        </label>
                        <select name="business_scale" id="business_scale" required
                            class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                            <option value="mikro" {{ old('business_scale', $umkm->business_scale) == 'mikro' ? 'selected' : '' }}>Usaha Mikro</option>
                            <option value="kecil" {{ old('business_scale', $umkm->business_scale) == 'kecil' ? 'selected' : '' }}>Usaha Kecil</option>
                            <option value="menengah" {{ old('business_scale', $umkm->business_scale) == 'menengah' ? 'selected' : '' }}>Usaha Menengah</option>
                        </select>
                    </div>

                    <div>
                        <label for="sales_channel" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Metode Penjualan <span class="text-red-500">*</span>
                        </label>
                        <select name="sales_channel" id="sales_channel" required
                            class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                            <option value="offline" {{ old('sales_channel', $umkm->sales_channel) == 'offline' ? 'selected' : '' }}>Hanya Offline</option>
                            <option value="online" {{ old('sales_channel', $umkm->sales_channel) == 'online' ? 'selected' : '' }}>Hanya Online</option>
                            <option value="gabungan" {{ old('sales_channel', $umkm->sales_channel) == 'gabungan' ? 'selected' : '' }}>Gabungan (Offline & Online)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Baris 5: Kontak, Status, Foto -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label for="public_phone" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        No. Telepon / WhatsApp
                    </label>
                    <input type="text" name="public_phone" id="public_phone" value="{{ old('public_phone', $umkm->public_phone) }}"
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                </div>

                <div>
                    <label for="status" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Status Publikasi <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                        <option value="published" {{ old('status', $umkm->status) == 'published' ? 'selected' : '' }}>Terpublikasi</option>
                        <option value="draft" {{ old('status', $umkm->status) == 'draft' ? 'selected' : '' }}>Draf</option>
                        <option value="archived" {{ old('status', $umkm->status) == 'archived' ? 'selected' : '' }}>Arsip</option>
                    </select>
                </div>

                <div>
                    <label for="photo" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Ganti Foto Usaha (Opsional)
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                    @if($umkm->photo_path)
                        <div class="mt-2 flex items-center gap-2">
                            <img src="{{ asset('storage/' . $umkm->photo_path) }}" alt="{{ $umkm->name }}" class="w-10 h-10 object-cover rounded-lg border">
                            <span class="text-[11px] text-slate-500">Foto saat ini</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Baris 6: Peta Titik Koordinat -->
            <div class="border-t border-slate-100 pt-6">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Perbarui Titik Lokasi Peta</h3>
                        <p class="text-xs text-slate-500">Geser penanda pin atau klik lokasi baru pada peta untuk memperbarui koordinat.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="latitude" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Latitude</label>
                        <input type="number" step="any" name="latitude" id="latitude" value="{{ old('latitude', $umkm->latitude ?? -7.8034) }}"
                            class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                    <div>
                        <label for="longitude" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Longitude</label>
                        <input type="number" step="any" name="longitude" id="longitude" value="{{ old('longitude', $umkm->longitude ?? 111.9861) }}"
                            class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                </div>

                <div id="picker-map" class="w-full h-72 rounded-2xl border border-slate-200 overflow-hidden shadow-inner"></div>
            </div>

            <!-- Submit Button Bar -->
            <div class="border-t border-slate-100 pt-6 flex items-center justify-end gap-3">
                <a href="{{ route('admin.umkm.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-md shadow-emerald-500/20 transition">
                    Simpan Perubahan
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

        const map = L.map('picker-map').setView([defaultLat, defaultLng], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        function updateInputs(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
        }

        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateInputs(e.latlng.lat, e.latlng.lng);
        });

        marker.on('dragend', function (e) {
            const pos = marker.getLatLng();
            updateInputs(pos.lat, pos.lng);
        });
    });
</script>
@endpush
