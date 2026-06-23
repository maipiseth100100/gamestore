<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Library;

class LibraryController extends Controller
{
    public function index()
    {
        $games = Library::with('game')
            ->where('user_id',auth()->id())
            ->get();

        return view(
            'frontend.library.index',
            compact('games')
        );
    }
}