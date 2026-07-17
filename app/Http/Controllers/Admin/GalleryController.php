<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::latest()->paginate(10);

        return view('admin.galleries.index', compact('items'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.galleries.form', compact('destinations', 'users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'destination_id' => 'required',
            'image' => 'required',
            'caption' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Gallery::create($data);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Gallery $gallery)
    {
        $item = $gallery;
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.galleries.form', compact('item', 'destinations', 'users'));
    }

    public function update(Request $r, Gallery $gallery)
    {
        $data = $r->validate([
            'destination_id' => 'required',
            'image' => 'required',
            'caption' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $gallery->update($data);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}