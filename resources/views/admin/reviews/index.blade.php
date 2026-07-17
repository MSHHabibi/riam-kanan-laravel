@extends('layouts.admin')

@section('content')
<div class="topbar">
    <h1>Review</h1>

    <a class="btn" href="{{ route('reviews.create') }}">
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

            <td>{{ $item->comment }}</td>

            <td>
                <a class="btn" href="{{ route('reviews.edit', $item) }}">
                    Edit
                </a>

                <form
                    style="display:inline"
                    method="post"
                    action="{{ route('reviews.destroy', $item) }}"
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