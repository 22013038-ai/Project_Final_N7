<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        $file = $request->file('image');

        $name = time() . '_' . uniqid() . '.' . $file->extension();

        $file->move(public_path('banners'), $name);

        Banner::create([
            'title' => $request->title,
            'image' => $name,
            'link' => $request->link ?? '',
            'description' => $request->description ?? '',
            'status' => 1
        ]);

        return redirect()
            ->route('banners.index')
            ->with('success', 'Thêm banner thành công');
    }

    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->description = $request->description;

        if ($request->hasFile('image')) {

            if (
                $banner->image &&
                file_exists(public_path('banners/' . $banner->image))
            ) {
                unlink(public_path('banners/' . $banner->image));
            }

            $file = $request->file('image');

            $name = time() . '_' . uniqid() . '.' . $file->extension();

            $file->move(public_path('banners'), $name);

            $banner->image = $name;
        }

        $banner->save();

        return redirect()
            ->route('banners.index')
            ->with('success', 'Cập nhật banner thành công');
    }

    public function destroy(Banner $banner)
    {
        if (
            $banner->image &&
            file_exists(public_path('banners/' . $banner->image))
        ) {
            unlink(public_path('banners/' . $banner->image));
        }

        $banner->delete();

        return redirect()
            ->route('banners.index')
            ->with('success', 'Xóa banner thành công');
    }
}