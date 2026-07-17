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
            <p class="eyebrow">Explore Destination</p>
            <h1>Destinasi Wisata</h1>
            <p>
                Temukan pulau, camping ground, bukit, air terjun, dan destinasi
                terbaik di kawasan Waduk Riam Kanan.
            </p>
        </div>

        <div class="front-stats">
            <div>
                <b>{{ $destinations->total() }}</b>
                <span>Destinasi</span>
            </div>
            <div>
                <b>4.8</b>
                <span>Rating</span>
            </div>
            <div>
                <b>12K+</b>
                <span>Pengunjung</span>
            </div>
        </div>
    </div>

    <div class="front-container">

        <div class="front-panel">
            <form class="front-form" method="get" action="{{ route('front.destinations') }}">
                <div>
                    <label>Cari Destinasi</label>
                    <input
                        name="search"
                        placeholder="Cari destinasi..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div>
                    <label>Kategori</label>
                    <select name="category">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $c)
                            <option
                                value="{{ $c->id }}"
                                @selected(request('category') == $c->id)
                            >
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Filter</button>
            </form>
        </div>

        <div class="front-grid">
            @forelse($destinations as $d)

                <div class="front-card">

                    @if($d->name == 'Pulau Pinus')
                        <img
                            src="{{ asset('images/pulau-pinus.jpg') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @elseif($d->name == 'Pulau Bekantan')
                        <img
                            src="{{ asset('images/Pulau-Bekantan.png') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @elseif($d->name == 'ALIMPUNG ISLAND')
                        <img
                            src="{{ asset('images/ALIMPUNG_ISLAND.png') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @elseif($d->name == 'Danau Bukit Batu')
                        <img
                            src="{{ asset('images/Danau-Bukit-Batu.png') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @elseif($d->name == 'Air Terjun Mandin Tinggi')
                        <img
                            src="{{ asset('images/Air-Terjun-Mandin-Tinggi.png') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @elseif($d->name == 'Glamping Batu Laba')
                        <img
                            src="{{ asset('images/Glamping-Batu-Laba.png') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >

                    @else
                        <img
                            src="{{ asset('images/default-wisata.jpg') }}"
                            alt="{{ $d->name }}"
                            style="width:100%;height:190px;object-fit:cover;"
                        >
                    @endif

                    <div class="front-card-body">
                        <small style="color:#0EA5E9;font-weight:bold;">
                            {{ $d->category->name }}
                        </small>

                        <h3>{{ $d->name }}</h3>

                        <p>
                            <span class="rating">★ {{ $d->rating }}</span>
                            • {{ $d->location }}
                        </p>

                        <p>
                            Harga tiket mulai dari
                            <b>Rp {{ number_format($d->ticket_price, 0, ',', '.') }}</b>
                        </p>

                        <a
                            class="btn"
                            href="{{ route('front.destinations.show', $d) }}"
                        >
                            Detail
                        </a>
                    </div>
                </div>

            @empty
                <div class="empty-card">
                    <h3>Destinasi tidak ditemukan</h3>
                    <p>Silakan coba kata kunci atau kategori lain.</p>
                </div>
            @endforelse
        </div>

        <br>

        <div style="color:white;">
            {{ $destinations->links() }}
        </div>

    </div>
</div>
@endsection