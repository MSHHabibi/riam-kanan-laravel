<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Island;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IslandController extends Controller
{
    public function index()
    {
        $items = Island::latest()->paginate(10);

        return view('admin.islands.index', compact('items'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.islands.form', compact('destinations', 'users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'destination_id' => 'nullable',
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'description' => 'nullable',
            'activities' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Island::create($data);

        return redirect()
            ->route('islands.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Island $island)
    {
        $item = $island;
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.islands.form', compact('item', 'destinations', 'users'));
    }

    public function update(Request $r, Island $island)
    {
        $data = $r->validate([
            'destination_id' => 'nullable',
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'description' => 'nullable',
            'activities' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $island->update($data);

        return redirect()
            ->route('islands.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Island $island)
    {
        $island->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}