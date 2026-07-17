@extends('layouts.admin')

@section('content')
<h1>Form Review</h1>

<form
    class="form"
    method="post"
    action="{{ isset($item) ? route('reviews.update', $item) : route('reviews.store') }}"
>
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <label>User ID</label>
    <input
        name="user_id"
        value="{{ old('user_id', $item->user_id ?? '') }}"
    >

    <label>Destination ID</label>
    <input
        name="destination_id"
        value="{{ old('destination_id', $item->destination_id ?? '') }}"
    >

    <label>Rating</label>
    <input
        name="rating"
        value="{{ old('rating', $item->rating ?? '') }}"
    >

    <label>Komentar</label>
    <input
        name="comment"
        value="{{ old('comment', $item->comment ?? '') }}"
    >

    <label>Status</label>
    <input
        name="status"
        value="{{ old('status', $item->status ?? 'approved') }}"
    >

    <button>
        Simpan
    </button>
</form>
@endsection