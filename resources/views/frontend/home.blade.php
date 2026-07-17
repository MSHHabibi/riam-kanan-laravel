@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="/css/style.css?v=999">
@endsection

@section('content')
<section class="hero">
    <nav class="nav">
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

    <div class="hero-content">
        <div>
            <h1>
                Jelajahi Pesona<br>
                <span class="script">Waduk Riam Kanan</span>
            </h1>

            <p>
                Nikmati keindahan alam, pulau-pulau eksotis, kelotok, camping,
                dan kuliner khas di surga tersembunyi Kalimantan Selatan.
            </p>

            <form class="search" action="{{ route('front.destinations') }}">
                <input
                    name="search"
                    placeholder="Cari destinasi, pulau, atau aktivitas..."
                >
                <button>Cari</button>
            </form>

            <div class="stats">
                <div>
                    <b>17</b><br>
                    Pulau
                </div>
                <div>
                    <b>{{ $totalDestinations }}+</b><br>
                    Destinasi
                </div>
                <div>
                    <b>12K+</b><br>
                    Pengunjung
                </div>
                <div>
                    <b>4.8</b><br>
                    Rating
                </div>
            </div>
        </div>

        <div class="hero-destinations">
            @foreach($popular as $index => $d)
                <div class="hero-card">
                    @if($d->name == 'Pulau Pinus')
                        <img src="{{ asset('images/pulau-pinus.jpg') }}" alt="{{ $d->name }}">

                    @elseif($d->name == 'Pulau Bekantan')
                        <img src="{{ asset('images/Pulau-Bekantan.png') }}" alt="{{ $d->name }}">

                    @elseif($d->name == 'ALIMPUNG ISLAND')
                        <img src="{{ asset('images/ALIMPUNG_ISLAND.png') }}" alt="{{ $d->name }}">

                    @elseif($d->name == 'Danau Bukit Batu')
                        <img src="{{ asset('images/Danau-Bukit-Batu.png') }}" alt="{{ $d->name }}">

                    @elseif($d->name == 'Air Terjun Mandin Tinggi')
                        <img src="{{ asset('images/Air-Terjun-Mandin-Tinggi.png') }}" alt="{{ $d->name }}">

                    @elseif($d->name == 'Glamping Batu Laba')
                        <img src="{{ asset('images/Glamping-Batu-Laba.png') }}" alt="{{ $d->name }}">

                    @else
                        <img src="{{ asset('images/default-wisata.jpg') }}" alt="{{ $d->name }}">
                    @endif

                    <div class="hero-card-content">
                        <h3>{{ $d->name }}</h3>
                        <p>{{ $d->location }}</p>
                        <a class="btn" href="{{ route('front.destinations.show', $d) }}">
                            Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection