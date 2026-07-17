<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Boat;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'destinations' => Destination::count(),
            'categories' => Category::count(),
            'boats' => Boat::count(),
            'reviews' => Review::count(),
            'users' => User::count(),
            'popular' => Destination::where('is_popular', 1)->take(4)->get()
        ]);
    }
}