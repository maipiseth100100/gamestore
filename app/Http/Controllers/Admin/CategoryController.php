<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|unique:categories,slug',
        'icon_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'status' => 'required|boolean',
    ]);

    $path = null;

    // upload image
    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('categories', 'public');
    }

    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->slug),
        'icon_image' => $path,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category created successfully!');
}

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $iconPath = $category->icon_image;

        // ✅ UPDATE IMAGE
        if ($request->hasFile('icon_image')) {

            if ($category->icon_image) {
                Storage::disk('public')->delete($category->icon_image);
            }

            $iconPath = $request->file('icon_image')
                ->store('categories/icons', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => $this->generateUniqueSlug($request->name, $category->id),
            'icon_image' => $iconPath,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->icon_image) {
            Storage::disk('public')->delete($category->icon_image);
        }

        $category->delete();

        return back()->with('success', 'Category deleted successfully');
    }

    // ✅ UNIQUE SLUG FIX
    private function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (
            Category::where('slug', $slug)
                ->when($ignoreId, function ($q) use ($ignoreId) {
                    $q->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }
}