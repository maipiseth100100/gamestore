<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('category')
            ->latest()
            ->paginate(20);

        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.games.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'screenshots.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'trailer_url'   => 'nullable|url',
            'price'         => 'required|numeric|min:0',
            'description'   => 'nullable',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')
                ->store('games', 'public');
        }

        $screenshots = [];

        if ($request->hasFile('screenshots')) {

            foreach ($request->file('screenshots') as $file) {

                $screenshots[] = $file->store(
                    'games/screenshots',
                    'public'
                );
            }
        }

        Game::create([
            'category_id'  => $request->category_id,
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'image'        => $image,
            'screenshots'  => $screenshots,
            'trailer_url'  => $request->trailer_url,
            'price'        => $request->price,
            'description'  => $request->description,
            'featured'     => $request->has('featured'),
            'latest_games' => $request->has('latest_games'),
            'status'       => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Game created successfully.');
    }

    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.games.edit', compact(
            'game',
            'categories'
        ));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'screenshots.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'trailer_url'   => 'nullable|url',
            'price'         => 'required|numeric|min:0',
            'description'   => 'nullable',
        ]);

        $image = $game->image;

        if ($request->hasFile('image')) {

            if ($game->image) {
                Storage::disk('public')
                    ->delete($game->image);
            }

            $image = $request->file('image')
                ->store('games', 'public');
        }

        $screenshots = $game->screenshots ?? [];

        if ($request->hasFile('screenshots')) {

            if (!empty($screenshots)) {

                foreach ($screenshots as $shot) {
                    Storage::disk('public')
                        ->delete($shot);
                }
            }

            $screenshots = [];

            foreach ($request->file('screenshots') as $file) {

                $screenshots[] = $file->store(
                    'games/screenshots',
                    'public'
                );
            }
        }

        $game->update([
            'category_id'  => $request->category_id,
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'image'        => $image,
            'screenshots'  => $screenshots,
            'trailer_url'  => $request->trailer_url,
            'price'        => $request->price,
            'description'  => $request->description,
            'featured'     => $request->has('featured'),
            'latest_games' => $request->has('latest_games'),
            'status'       => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        if ($game->image) {
            Storage::disk('public')
                ->delete($game->image);
        }

        if (!empty($game->screenshots)) {

            foreach ($game->screenshots as $shot) {
                Storage::disk('public')
                    ->delete($shot);
            }
        }

        $game->delete();

        return redirect()
            ->route('admin.games.index')
            ->with('success', 'Game deleted successfully.');
    }
}