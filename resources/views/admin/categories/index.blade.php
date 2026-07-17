@extends('layouts.admin')

@section('content')
<div class="topbar">
    <h1>Kategori</h1>

    <a class="btn" href="{{ route('categories.create') }}">
        + Tambah
    </a>
</div>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nama/Data</th>
        <th>Aksi</th>
    </tr>

    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>

            <td>{{ $item->name }}</td>

            <td>
                <a class="btn" href="{{ route('categories.edit', $item) }}">
                    Edit
                </a>

                <form
                    style="display:inline"
                    method="post"
                    action="{{ route('categories.destroy', $item) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Hapus data?')">
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