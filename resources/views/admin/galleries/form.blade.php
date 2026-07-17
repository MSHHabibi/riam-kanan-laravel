@extends('layouts.admin')

@section('content')
<h1>Form Galeri</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('galleries.update', $item) : route('galleries.store') }}"
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

    <label>Image</label>
    <input
        name="image"
        value="{{ old('image', $item->image ?? '') }}"
    >

    <label>Caption</label>
    <input
        name="caption"
        value="{{ old('caption', $item->caption ?? '') }}"
    >

    <button>
        Simpan
    </button>
</form>
@endsection