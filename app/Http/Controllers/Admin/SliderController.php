<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $uploadPath = public_path('uploads/sliders');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file = $request->file('image');

            $imageName = time() . '_' . preg_replace(
                '/\s+/',
                '_',
                $file->getClientOriginalName()
            );

            $file->move($uploadPath, $imageName);
        }

        Slider::create([
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'image'       => $imageName,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'status'      => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $slider->image;

        if ($request->hasFile('image')) {

            if (
                $slider->image &&
                File::exists(public_path('uploads/sliders/' . $slider->image))
            ) {
                File::delete(
                    public_path('uploads/sliders/' . $slider->image)
                );
            }

            $uploadPath = public_path('uploads/sliders');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file = $request->file('image');

            $imageName = time() . '_' . preg_replace(
                '/\s+/',
                '_',
                $file->getClientOriginalName()
            );

            $file->move($uploadPath, $imageName);
        }

        $slider->update([
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'image'       => $imageName,
            'button_text' => $request->button_text,
            'status'      => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if (
            $slider->image &&
            File::exists(public_path('uploads/sliders/' . $slider->image))
        ) {
            File::delete(
                public_path('uploads/sliders/' . $slider->image)
            );
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}