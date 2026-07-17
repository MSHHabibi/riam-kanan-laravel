@extends('layouts.admin')

@section('content')
<h1>Form Pulau</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('islands.update', $item) : route('islands.store') }}"
>
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <label>Destination ID</label>
    <input
        name="destination_id"
        value="{{ old('destination_id', $item->destination_id ?? '') }}"
    >

    <label>Nama</label>
    <input
        name="name"
        value="{{ old('name', $item->name ?? '') }}"
    >

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

    <label>Deskripsi</label>
    <input
        name="description"
        value="{{ old('description', $item->description ?? '') }}"
    >

    <label>Aktivitas</label>
    <input
        name="activities"
        value="{{ old('activities', $item->activities ?? '') }}"
    >

    <button>
        Simpan
    </button>
</form>
@endsection