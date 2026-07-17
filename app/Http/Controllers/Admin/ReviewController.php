<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function index()
    {
        $items = Review::latest()->paginate(10);

        return view('admin.reviews.index', compact('items'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.reviews.form', compact('destinations', 'users'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'user_id' => 'required',
            'destination_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'status' => 'required'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Review::create($data);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Review $review)
    {
        $item = $review;
        $destinations = Destination::all();
        $users = User::all();

        return view('admin.reviews.form', compact('item', 'destinations', 'users'));
    }

    public function update(Request $r, Review $review)
    {
        $data = $r->validate([
            'user_id' => 'required',
            'destination_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'status' => 'required'
        ]);

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $review->update($data);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}