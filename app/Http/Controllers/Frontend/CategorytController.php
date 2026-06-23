<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $games = $category->games()
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        return view(
            'frontend.categories.show',
            compact('category', 'games')
        );
    }
}