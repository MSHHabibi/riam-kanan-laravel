@extends('layouts.admin')

@section('content')
<div class="topbar">
    <h1>Destinasi</h1>

    <div>
        <a class="btn" href="{{ route('destinations.export.pdf') }}">
            Export PDF
        </a>

        <a class="btn" href="{{ route('destinations.export.excel') }}">
            Export Excel
        </a>

        <a class="btn" href="{{ route('destinations.create') }}">
            + Tambah
        </a>
    </div>
</div>

<form>
    <input
        name="search"
        placeholder="Cari destinasi"
        value="{{ request('search') }}"
    >

    <button>
        Cari
    </button>
</form>

<br>

<table class="table">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </tr>

    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->location }}</td>
            <td>
                <a class="btn" href="{{ route('destinations.edit', $item) }}">
                    Edit
                </a>

                <form
                    style="display:inline"
                    method="post"
                    action="{{ route('destinations.destroy', $item) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Hapus?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<br>

{{ $items->links() }}
@endsection