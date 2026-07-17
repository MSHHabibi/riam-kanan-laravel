@extends('layouts.admin')

@section('content')
<h1>Form Kelotok</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('boats.update', $item) : route('boats.store') }}"
>
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <label>Nama</label>
    <input
        name="name"
        value="{{ old('name', $item->name ?? '') }}"
    >

    <label>Harga</label>
    <input
        name="price"
        value="{{ old('price', $item->price ?? '') }}"
    >

    <label>Kapasitas</label>
    <input
        name="capacity"
        value="{{ old('capacity', $item->capacity ?? '') }}"
    >

    <label>Nomor HP</label>
    <input
        name="phone"
        value="{{ old('phone', $item->phone ?? '') }}"
    >

    <label>Status</label>
    <input
        name="status"
        value="{{ old('status', $item->status ?? 'tersedia') }}"
    >

    <label>Deskripsi</label>
    <input
        name="description"
        value="{{ old('description', $item->description ?? '') }}"
    >

    <button>
        Simpan
    </button>
</form>
@endsection