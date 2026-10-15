@extends('layouts.app')

@section('title', 'Peta Persebaran Lokasi UMKM Kelurahan Dermo')

@section('content')
<div class="h-[calc(100vh-4rem)] flex flex-col lg:flex-row relative overflow-hidden">
    <!-- Sidebar Kontrol & Filter -->
    <aside class="w-full lg:w-96 bg-white border-b lg:border-b-0 lg:border-r border-slate-200 z-10 flex flex-col flex-shrink-0 shadow-lg lg:shadow-none max-h-72 lg:max-h-full overflow-y-auto">
        <div class="p-5 border-b border-slate-100 space-y-4">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600 block">Sistem Informasi Geografis</span>
                <h1 class="text-xl font-extrabold text-slate-900">Peta UMKM Dermo</h1>
                <p class="text-xs text-slate-500 mt-1">Cari dan jelajahi sebaran lokasi unit usaha mikro, kecil, dan menengah di Kelurahan Dermo.</p>
            </div>

            <!-- Search Input -->
            <div class="relative">
                <input type="text" id="map-search" placeholder="Cari nama usaha atau produk..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Category Filter Select -->
            <div>
                <label for="map-category" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Filter Kategori</label>
                <select id="map-category" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    <option value="">Semua Kategori Usaha</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Marker Counter & List -->
        <div class="p-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-600">
            <span>Ditemukan <span id="marker-count" class="text-emerald-600 font-bold">0</span> Titik Lokasi</span>
            <button id="btn-reset-map" class="text-slate-400 hover:text-slate-700 transition">Pusatkan Peta</button>
        </div>

        <div id="umkm-list-container" class="flex-1 divide-y divide-slate-100 overflow-y-auto">
            <!-- Dynamic items loaded here -->
        </div>
    </aside>

    <!-- Map Canvas Area -->
    <div class="flex-1 relative bg-slate-100">
        <div id="full-map" class="w-full h-full"></div>

        <!-- Map Floating Legend -->
        <div class="absolute bottom-5 right-5 z-[500] bg-white/95 backdrop-blur-md p-4 rounded-2xl border border-slate-200/90 shadow-xl max-w-xs text-xs">
            <h4 class="font-bold text-slate-900 mb-2">Petunjuk Peta Dermo</h4>
            <div class="space-y-1.5 text-slate-600">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                    <span>Titik Lokasi UMKM Dermo</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-teal-600"></span>
                    <span>Wilayah Kec. Mojoroto, Kota Kediri</span>
                </div>
            </div>
            <p class="text-[10px] text-slate-400 mt-2 pt-2 border-t border-slate-100">
                Klik ikon penanda untuk membuka info usaha & tautan rincian profil.
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dermoCenter = [-7.8038, 111.9861];
        const map = L.map('full-map').setView(dermoCenter, 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let markersLayer = L.layerGroup().addTo(map);
        let allMarkersData = [];

        function renderList(items) {
            const container = document.getElementById('umkm-list-container');
            const countEl = document.getElementById('marker-count');
            countEl.textContent = items.length;

            if (items.length === 0) {
                container.innerHTML = `
                    <div class="p-8 text-center text-slate-400 text-xs">
                        <svg class="w-8 h-8 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Tidak ada UMKM yang cocok dengan kata kunci atau filter ini.
                    </div>
                `;
                return;
            }

            let html = '';
            items.forEach((item, index) => {
                html += `
                    <div class="p-4 hover:bg-emerald-50/40 transition cursor-pointer group" onclick="focusMarker(${index})">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600">${item.category}</span>
                        <h4 class="font-bold text-sm text-slate-900 group-hover:text-emerald-700 transition mt-0.5">${item.name}</h4>
                        <p class="text-xs text-slate-500 mt-0.5 line-clamp-1">${item.address}</p>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100 text-[11px]">
                            <span class="text-slate-400 capitalize">Skala: ${item.business_scale}</span>
                            <span class="text-emerald-600 font-semibold">Lihat di Peta &rarr;</span>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        let leafletMarkers = [];

        function loadMapData() {
            const search = document.getElementById('map-search').value;
            const category = document.getElementById('map-category').value;

            const url = new URL("{{ route('api.map.data') }}", window.location.origin);
            if (search) url.searchParams.set('search', search);
            if (category) url.searchParams.set('category', category);

            fetch(url)
                .then(res => res.json())
                .then(json => {
                    markersLayer.clearLayers();
                    leafletMarkers = [];
                    allMarkersData = json.data || [];

                    renderList(allMarkersData);

                    const bounds = [];
                    allMarkersData.forEach((item, idx) => {
                        const m = L.marker([item.lat, item.lng]).addTo(markersLayer);
                        bounds.push([item.lat, item.lng]);
                        leafletMarkers.push(m);

                        m.bindPopup(`
                            <div class="p-1 max-w-xs text-slate-800">
                                <span class="text-[10px] font-bold uppercase text-emerald-600">${item.category}</span>
                                <h4 class="font-bold text-sm text-slate-900 mt-0.5">${item.name}</h4>
                                <p class="text-xs text-slate-500 mt-1">${item.address}</p>
                                <div class="mt-2 text-xs text-slate-600 flex items-center justify-between">
                                    <span>Skala: <b>${item.business_scale}</b></span>
                                    <span>${item.phone ? '☎ ' + item.phone : ''}</span>
                                </div>
                                <a href="${item.detail_url}" class="mt-2.5 block text-center py-1.5 px-3 rounded-lg bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition">
                                    Buka Detail Lengkap
                                </a>
                            </div>
                        `);
                    });

                    if (bounds.length > 0 && !search && !category) {
                        map.fitBounds(bounds, { padding: [50, 50] });
                    }
                })
                .catch(err => console.error("Error fetching map markers:", err));
        }

        window.focusMarker = function (index) {
            if (leafletMarkers[index] && allMarkersData[index]) {
                const item = allMarkersData[index];
                map.setView([item.lat, item.lng], 17);
                leafletMarkers[index].openPopup();
            }
        };

        // Filter events
        let debounceTimer;
        document.getElementById('map-search').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(loadMapData, 300);
        });

        document.getElementById('map-category').addEventListener('change', loadMapData);

        document.getElementById('btn-reset-map').addEventListener('click', function () {
            map.setView(dermoCenter, 15);
        });

        // Initial Load
        loadMapData();
    });
</script>
@endpush
