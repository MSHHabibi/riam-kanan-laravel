@extends('layouts.admin')

@section('content')
<h1>Form Kategori</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('categories.update', $item) : route('categories.store') }}"
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

    <label>Slug</label>
    <input
        name="slug"
        value="{{ old('slug', $item->slug ?? '') }}"
    >

    <label>Icon</label>
    <input
        name="icon"
        value="{{ old('icon', $item->icon ?? '') }}"
    >

    <button>
        Simpan
    </button>
</form>
@endsection