@extends('layouts.app')

@section('content')
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

    <div class="front-header">
        <div>
            <p class="eyebrow">Transportasi Wisata</p>
            <h1>Kelotok Riam Kanan</h1>
            <p>
                Pilih kelotok untuk menjelajahi pulau-pulau, camping ground,
                dan destinasi wisata di Waduk Riam Kanan.
            </p>
        </div>

        <div class="front-stats">
            <div>
                <b>{{ $boats->total() }}</b>
                <span>Kelotok</span>
            </div>
            <div>
                <b>10+</b>
                <span>Kapasitas</span>
            </div>
            <div>
                <b>Ready</b>
                <span>Status</span>
            </div>
        </div>
    </div>

    <div class="front-container">

        <div class="front-grid">
            @forelse($boats as $b)
                <div class="front-card">
                    @if($b->name == 'Kelotok Bintang')
                        <img
                            src="{{ asset('images/kelotok-bintang.jpg') }}"
                            alt="{{ $b->name }}"
                            class="boat-img"
                        >

                    @elseif($b->name == 'Kelotok Sejahtera')
                        <img
                            src="{{ asset('images/kelotok-sejahtera.jpg') }}"
                            alt="{{ $b->name }}"
                            class="boat-img"
                        >

                    @elseif($b->name == 'Kelotok Riam Indah')
                        <img
                            src="{{ asset('images/kelotok-riam-indah.jpg') }}"
                            alt="{{ $b->name }}"
                            class="boat-img"
                        >

                    @else
                        <img
                            src="{{ asset('images/default-kelotok.jpg') }}"
                            alt="{{ $b->name }}"
                            class="boat-img"
                        >
                    @endif
                    <div class="front-card-body">
                        <span class="status-ready">
                            {{ ucfirst($b->status) }}
                        </span>

                        <h3 style="margin-top:12px;">
                            {{ $b->name }}
                        </h3>

                        <div class="boat-meta">
                            <span>
                                👥 Kapasitas: {{ $b->capacity }} orang
                            </span>

                            <span>
                                💰 Harga: Rp {{ number_format($b->price, 0, ',', '.') }}
                            </span>

                            <span>
                                📞 Nomor HP: {{ $b->phone }}
                            </span>
                        </div>

                        <p>
                            {{ $b->description }}
                        </p>

                        <a class="btn" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $b->phone) }}">
                            Booking
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty-card">
                    <h3>Data kelotok belum tersedia</h3>
                    <p>Admin belum menambahkan data kelotok.</p>
                </div>
            @endforelse
        </div>

        <br>

        <div style="color:white;">
            {{ $boats->links() }}
        </div>

    </div>
</div>
@endsection