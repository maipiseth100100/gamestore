<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Store review
     */
    public function store(Request $request)
    {
        // ✅ Validate request
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating'  => 'required|integer|min:1|max:5',
            'review'  => 'required|string',
        ]);

        try {

            // ✅ Save review
            Review::create([
                'user_id' => auth()->id(),
                'game_id' => $request->game_id,
                'rating'  => $request->rating,
                'review'  => $request->review,
                'status'  => 1
            ]);

            // ✅ Success message
            return back()->with('success', 'Review submitted successfully!');

        } catch (\Exception $e) {

            // ❌ Error message
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}