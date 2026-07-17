@extends('layouts.app')

@section('content')
@php
    $imageClass = 'detail-hero-photo';

    if ($destination->name == 'Pulau Pinus') {
        $imageClass .= ' img-pinus';
    } elseif ($destination->name == 'Pulau Bekantan') {
        $imageClass .= ' img-bekantan';
    } elseif ($destination->name == 'ALIMPUNG ISLAND') {
        $imageClass .= ' img-ISLAND';
    } elseif ($destination->name == 'Danau Bukit Batu') {
        $imageClass .= ' img-bukit';
    } elseif ($destination->name == 'Air Terjun Mandin Tinggi') {
        $imageClass .= ' img-air';
    } elseif ($destination->name == 'Glamping Batu Laba') {
        $imageClass .= ' img-camping';
    }
@endphp
<link rel="stylesheet" href="/css/style.css?v=999">
<div class="front-page">

    <nav class="front-navbar">
        <div class="brand">
            <div class="logo">🌊</div>
            <b>Riam Kanan Explorer</b>
        </div>

        <div>
            <a href="/">Beranda</a>
            <a href="{{ route('front.destinations') }}">Destinasi</a>
            <a href="{{ route('front.boats') }}">Kelotok</a>
            <a href="{{ route('front.map') }}">Peta</a>
            <a href="{{ route('login') }}" class="btn">Login</a>
        </div>
    </nav>

    <div class="front-container">

        <a
            href="{{ route('front.destinations') }}"
            style="color:#dbeafe;display:inline-block;margin-bottom:18px;"
        >
            ‹ Kembali ke Destinasi
        </a>

        <div class="detail-layout-modern">

            <section>
                <div class="{{ $imageClass }}">
                    <div class="detail-title-overlay">
                        <p class="eyebrow">
                            {{ $destination->category->name }}
                        </p>

                        <h1>
                            {{ $destination->name }}
                        </h1>

                        <p>
                            <span class="rating">★ {{ $destination->rating }}</span>
                            • {{ $destination->location }}
                        </p>
                    </div>
                </div>

                <div class="detail-content-card">
                    <div class="detail-tabs">
                        <span>Deskripsi</span>
                        <span>Fasilitas</span>
                        <span>Galeri</span>
                        <span>Ulasan</span>
                    </div>

                    <h2>Deskripsi Wisata</h2>

                    <p style="line-height:1.8;color:#475569;">
                        {{ $destination->description }}
                    </p>

                    <h2>Fasilitas Tersedia</h2>

                    <div class="facility-list">
                        @forelse($destination->facilities as $f)
                            <span class="facility-pill">
                                {{ $f->name }}
                            </span>
                        @empty
                            <span class="facility-pill">
                                Parkir
                            </span>

                            <span class="facility-pill">
                                Spot Foto
                            </span>

                            <span class="facility-pill">
                                Area Istirahat
                            </span>
                        @endforelse
                    </div>

                    <h2 style="margin-top:24px;">Review Pengunjung</h2>

                    @forelse($destination->reviews as $r)
                        <div class="review-box">
                            <b>{{ $r->user->name ?? 'Pengunjung' }}</b>
                            <p>
                                <span class="rating">★ {{ $r->rating }}</span>
                            </p>
                            <p style="color:#475569;">
                                {{ $r->comment }}
                            </p>
                        </div>
                    @empty
                        <div class="review-box">
                            Belum ada review untuk destinasi ini.
                        </div>
                    @endforelse
                </div>
            </section>

            <aside>
                <div class="detail-side-card">
                    <h2>Informasi</h2>

                    <div class="info-list">
                        <p>
                            🏷 Kategori:
                            <b>{{ $destination->category->name }}</b>
                        </p>

                        <p>
                            📍 Lokasi:
                            <b>{{ $destination->location }}</b>
                        </p>

                        <p>
                            🕘 Jam:
                            <b>{{ $destination->operational_hours }}</b>
                        </p>

                        <p>
                            🎫 Harga:
                            <b>Rp {{ number_format($destination->ticket_price, 0, ',', '.') }}</b>
                        </p>

                        <p>
                            👥 Pengunjung:
                            <b>{{ number_format($destination->visitor_count, 0, ',', '.') }}</b>
                        </p>
                    </div>

                    <br>

                    <a class="btn" href="{{ route('front.map') }}" style="width:100%;text-align:center;">
                        Route ke Lokasi
                    </a>

                    <br><br>

                    <a class="btn" href="#" style="width:100%;text-align:center;background:#10B981;">
                        Simpan Favorit
                    </a>

                    <div class="mini-map-detail"></div>
                </div>

                <div class="detail-side-card">
                    <h2>Tips Berkunjung</h2>

                    <p style="line-height:1.7;color:#475569;">
                        Datang pagi hari agar cuaca lebih sejuk. Jika ingin
                        mengunjungi beberapa pulau, gunakan jasa kelotok agar
                        perjalanan lebih mudah dan aman.
                    </p>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection