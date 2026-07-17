<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index(Request $r)
    {
        $items = Destination::with('category')
            ->when($r->search, function ($q) use ($r) {
                $q->where('name', 'like', '%' . $r->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.destinations.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.destinations.form', compact('categories'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'nullable',
            'location' => 'required',
            'description' => 'required',
            'main_image' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'ticket_price' => 'required|numeric',
            'operational_hours' => 'required',
            'rating' => 'nullable|numeric',
            'visitor_count' => 'nullable|integer',
            'is_popular' => 'nullable'
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['is_popular'] = $r->has('is_popular');

        Destination::create($data);

        return redirect()
            ->route('destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function edit(Destination $destination)
    {
        $item = $destination;
        $categories = Category::all();

        return view('admin.destinations.form', compact('item', 'categories'));
    }

    public function update(Request $r, Destination $destination)
    {
        $data = $r->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'nullable',
            'location' => 'required',
            'description' => 'required',
            'main_image' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'ticket_price' => 'required|numeric',
            'operational_hours' => 'required',
            'rating' => 'nullable|numeric',
            'visitor_count' => 'nullable|integer',
            'is_popular' => 'nullable'
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['is_popular'] = $r->has('is_popular');

        $destination->update($data);

        return redirect()
            ->route('destinations.index')
            ->with('success', 'Destinasi berhasil diupdate');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return back()->with('success', 'Destinasi berhasil dihapus');
    }

    public function exportPdf()
    {
        return response(
            'Export PDF destinasi dapat diintegrasikan dengan DomPDF. Data: ' .
            Destination::count() .
            ' destinasi'
        )->header('Content-Type', 'application/pdf');
    }

    public function exportExcel()
    {
        return response(
            "Nama,Lokasi\n" .
            Destination::all()
                ->map(fn($d) => $d->name . ',' . $d->location)
                ->join("\n")
        )
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename=destinasi.csv');
    }
}