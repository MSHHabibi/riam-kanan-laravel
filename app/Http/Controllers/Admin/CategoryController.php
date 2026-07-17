<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::latest()->paginate(10);

        return view('admin.categories.index', compact('items'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.categories.form', compact('destinations', 'users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required',
            'slug' => 'nullable',
            'icon' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        $item = $category;
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.categories.form', compact('item', 'destinations', 'users'));
    }

    public function update(Request $r, Category $category)
    {
        $data = $r->validate([
            'name' => 'required',
            'slug' => 'nullable',
            'icon' => 'nullable'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}