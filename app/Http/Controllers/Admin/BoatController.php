<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boat;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BoatController extends Controller
{
    public function index()
    {
        $items = Boat::latest()->paginate(10);

        return view('admin.boats.index', compact('items'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.boats.form', compact('destinations', 'users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'phone' => 'nullable',
            'status' => 'required',
            'description' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Boat::create($data);

        return redirect()
            ->route('boats.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Boat $boat)
    {
        $item = $boat;
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.boats.form', compact('item', 'destinations', 'users'));
    }

    public function update(Request $r, Boat $boat)
    {
        $data = $r->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'phone' => 'nullable',
            'status' => 'required',
            'description' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $boat->update($data);

        return redirect()
            ->route('boats.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Boat $boat)
    {
        $boat->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}