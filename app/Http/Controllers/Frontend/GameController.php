<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::latest()->paginate(12);

        return view('frontend.games.index', compact('games'));
    }

    public function show($slug)
    {
        $game = Game::where('slug',$slug)->firstOrFail();

        return view('frontend.games.show', compact('game'));
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();

        $games = $category->games()->paginate(12);

        return view('frontend.games.category', compact(
            'category',
            'games'
        ));
    }

    public function search(Request $request)
    {
        $games = Game::where(
            'title',
            'LIKE',
            "%{$request->search}%"
        )->paginate(12);

        return view('frontend.games.search', compact('games'));
    }
}