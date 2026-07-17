@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/style.css?v=999">
<div class="map-page">

    <nav class="map-navbar">
        <div class="brand">
            <div class="logo">🌊</div>
            <b>Riam Kanan Explorer</b>
        </div>

        <div>
            <a href="/">Beranda</a>
            <a href="{{ route('front.destinations') }}">Destinasi</a>
            <a href="{{ route('front.boats') }}">Kelotok</a>
            <a href="{{ route('login') }}" class="btn">Login</a>
        </div>
    </nav>

    <div class="map-header">
        <div>
            <p class="eyebrow">Peta Interaktif</p>
            <h1>Peta Destinasi Riam Kanan</h1>
            <p>
                Jelajahi titik wisata populer di sekitar Waduk Riam Kanan
                menggunakan peta asli berbasis OpenStreetMap dan Leaflet.js.
            </p>
        </div>

        <div class="map-stats">
            <div>
                <b>{{ $destinations->count() }}</b>
                <span>Destinasi</span>
            </div>
            <div>
                <b>17</b>
                <span>Pulau</span>
            </div>
            <div>
                <b>4.8</b>
                <span>Rating</span>
            </div>
        </div>
    </div>

    <div class="map-layout">

        <div class="real-map-card">
            <div id="riamMap"></div>
        </div>

        <div class="map-sidebar">
            <div class="info-card">
                <h3>Filter Destinasi</h3>

                <div class="filter-item active">
                    <span class="dot blue"></span>
                    Pulau
                </div>

                <div class="filter-item">
                    <span class="dot green"></span>
                    Wisata Alam
                </div>

                <div class="filter-item">
                    <span class="dot orange"></span>
                    Camping
                </div>

                <div class="filter-item">
                    <span class="dot red"></span>
                    Kuliner
                </div>
            </div>

            <div class="info-card">
                <h3>Destinasi Terdekat</h3>

                @foreach($destinations->take(4) as $d)
                    <div class="nearby-item">

                        @if($d->name == 'Pulau Pinus')
                            <img
                                src="{{ asset('images/pulau-pinus.jpg') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @elseif($d->name == 'Pulau Bekantan')
                            <img
                                src="{{ asset('images/Pulau-Bekantan.png') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @elseif($d->name == 'ALIMPUNG ISLAND')
                            <img
                                src="{{ asset('images/ALIMPUNG_ISLAND.png') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @elseif($d->name == 'Danau Bukit Batu')
                            <img
                                src="{{ asset('images/Danau-Bukit-Batu.png') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @elseif($d->name == 'Air Terjun Mandin Tinggi')
                            <img
                                src="{{ asset('images/Air-Terjun-Mandin-Tinggi.png') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @elseif($d->name == 'Glamping Batu Laba')
                            <img
                                src="{{ asset('images/Glamping-Batu-Laba.png') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >

                        @else
                            <img
                                src="{{ asset('images/default-wisata.jpg') }}"
                                alt="{{ $d->name }}"
                                class="nearby-img-real"
                            >
                        @endif

                        <div>
                            <b>{{ $d->name }}</b>
                            <p>⭐ {{ $d->rating }} • {{ $d->location }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="info-card gradient-card">
                <h3>Tips Wisata</h3>
                <p>
                    Klik marker pada peta untuk melihat nama destinasi, rating,
                    lokasi, dan tombol menuju halaman detail.
                </p>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        /*
         * Koordinat Riam Kanan / Aranio, Kabupaten Banjar.
         * Kamu bisa ubah titik ini kalau ingin lebih presisi.
         */
        const map = L.map('riamMap').setView([-3.5363855119834304, 115.0541691255276], 12);

        /*
         * Tile map asli dari OpenStreetMap.
         * Butuh koneksi internet.
         */
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        /*
         * Data marker destinasi.
         * Karena data latitude/longitude dari database mungkin masih mirip,
         * di sini dibuat koordinat manual sekitar kawasan Riam Kanan
         * supaya marker terlihat menyebar.
         */
        const destinations = [
            {
                name: 'Pulau Pinus',
                category: 'Pulau',
                rating: '4.6',
                location: 'Aranio, Banjar',
                lat: -3.5363855119834304,
                lng: 115.0541691255276,
                url: '#'
            },
            {
                name: 'Pulau Bekantan',
                category: 'Pulau',
                rating: '4.7',
                location: 'Aranio, Banjar',
                lat: -3.5267361730852045,
                lng: 115.0501579041152,
                url: '#'
            },
            {
                name: 'ALIMPUNG ISLAND',
                category: 'Pulau',
                rating: '4.8',
                location: 'Aranio, Banjar',
                lat: -3.523722802143073,
                lng: 115.01714940380721,
                url: '#'
            },
            {
                name: 'Glamping Batu Laba',
                category: 'Camping',
                rating: '4.8',
                location: 'Aranio, Banjar',
                lat: -3.5226948550670003,
                lng: 115.06466833319452,
                url: '#'
            },
            {
                name: 'Danau Bukit Batu',
                category: 'Wisata Alam',
                rating: '4.6',
                location: 'Aranio, Banjar',
                lat: -3.5148321436816925,
                lng: 115.07252610193439,
                url: '#'
            },
            {
                name: 'Air Terjun Mandin Tinggi',
                category: 'Wisata Alam',
                rating: '4.7',
                location: 'Aranio, Banjar',
                lat: -3.6240498594882977,
                lng: 115.12183917982395,
                url: '#'
            }
        ];

        const markerIcon = L.divIcon({
            className: 'custom-leaflet-marker',
            html: '<div class="marker-pin">📍</div>',
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -32]
        });

        destinations.forEach(function (item) {
            L.marker([item.lat, item.lng], { icon: markerIcon })
                .addTo(map)
                .bindPopup(`
                    <div class="map-popup">
                        <b>${item.name}</b>
                        <p>${item.category}</p>
                        <p>⭐ ${item.rating} • ${item.location}</p>
                    </div>
                `);
        });

        /*
         * Area waduk, hanya visual highlight.
         */
        L.circle([-3.5363855119834304, 115.0541691255276], {
            color: '#0EA5E9',
            fillColor: '#0EA5E9',
            fillOpacity: 0.12,
            radius: 4500
        }).addTo(map).bindPopup('Kawasan Waduk Riam Kanan');
    });
</script>
@endpush