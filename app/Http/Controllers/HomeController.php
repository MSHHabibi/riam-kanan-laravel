<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\Boat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'popular' => Destination::where('is_popular', 1)->take(4)->get(),
            'categories' => Category::all(),
            'totalDestinations' => Destination::count()
        ]);
    }

    public function destinations(Request $r)
    {
        $q = Destination::with('category');

        if ($r->search) {
            $q->where('name', 'like', '%' . $r->search . '%');
        }

        if ($r->category) {
            $q->where('category_id', $r->category);
        }

        return view('frontend.destinations', [
            'destinations' => $q->paginate(8),
            'categories' => Category::all()
        ]);
    }

    public function show(Destination $destination)
    {
        $destination->load(
            'category',
            'facilities',
            'galleries',
            'reviews.user'
        );

        return view('frontend.detail', compact('destination'));
    }

    public function boats()
    {
        return view('frontend.boats', [
            'boats' => Boat::paginate(9)
        ]);
    }

    public function map()
    {
        return view('frontend.map', [
            'destinations' => Destination::all()
        ]);
    }
}