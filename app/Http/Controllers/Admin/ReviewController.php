<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'game'])
            ->latest()
            ->paginate(20);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::with(['user', 'game'])
            ->findOrFail($id);

        return view('admin.reviews.show', compact('review'));
    }

    public function approve($id)
    {
        Review::findOrFail($id)->update([
            'status' => 1
        ]);

        return back()->with('success', 'Review approved successfully!');
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return back()->with('success', 'Review deleted successfully!');
    }
}