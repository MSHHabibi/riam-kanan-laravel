@extends('layouts.admin')

@section('content')
<div class="topbar">
    <div>
        <h1>Dashboard</h1>
        <p>Selamat datang, {{ auth()->user()->name }}</p>
    </div>
</div>

<div class="cards">
    <div class="card">
        <h3>{{ $destinations }}</h3>
        <p>Total Destinasi</p>
    </div>

    <div class="card">
        <h3>{{ $categories }}</h3>
        <p>Kategori</p>
    </div>

    <div class="card">
        <h3>{{ $boats }}</h3>
        <p>Kelotok</p>
    </div>

    <div class="card">
        <h3>{{ $reviews }}</h3>
        <p>Review</p>
    </div>
</div>

<h2>Destinasi Populer</h2>

<div class="dest-grid">
    @foreach($popular as $d)
        <div class="card">
            <h3>{{ $d->name }}</h3>
            <p>{{ $d->visitor_count }} pengunjung</p>
        </div>
    @endforeach
</div>
@endsection