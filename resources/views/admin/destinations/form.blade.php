@extends('layouts.admin')

@section('content')
<h1>Form Destinasi</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('destinations.update', $item) : route('destinations.store') }}"
>
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <label>Kategori</label>
    <select name="category_id">
        @foreach($categories as $c)
            <option
                value="{{ $c->id }}"
                @selected(old('category_id', $item->category_id ?? '') == $c->id)
            >
                {{ $c->name }}
            </option>
        @endforeach
    </select>

    <label>Nama</label>
    <input
        name="name"
        value="{{ old('name', $item->name ?? '') }}"
    >

    <label>Slug</label>
    <input
        name="slug"
        value="{{ old('slug', $item->slug ?? '') }}"
    >

    <label>Lokasi</label>
    <input
        name="location"
        value="{{ old('location', $item->location ?? '') }}"
    >

    <label>Deskripsi</label>
    <textarea name="description">{{ old('description', $item->description ?? '') }}</textarea>

    <label>Latitude</label>
    <input
        name="latitude"
        value="{{ old('latitude', $item->latitude ?? '') }}"
    >

    <label>Longitude</label>
    <input
        name="longitude"
        value="{{ old('longitude', $item->longitude ?? '') }}"
    >

    <label>Harga Tiket</label>
    <input
        name="ticket_price"
        value="{{ old('ticket_price', $item->ticket_price ?? 0) }}"
    >

    <label>Jam Operasional</label>
    <input
        name="operational_hours"
        value="{{ old('operational_hours', $item->operational_hours ?? '07.00 - 17.00 WITA') }}"
    >

    <label>Rating</label>
    <input
        name="rating"
        value="{{ old('rating', $item->rating ?? 4.8) }}"
    >

    <label>Pengunjung</label>
    <input
        name="visitor_count"
        value="{{ old('visitor_count', $item->visitor_count ?? 0) }}"
    >

    <label>
        <input
            type="checkbox"
            name="is_popular"
            @checked(old('is_popular', $item->is_popular ?? false))
        >
        Populer
    </label>

    <button>
        Simpan
    </button>
</form>
@endsection