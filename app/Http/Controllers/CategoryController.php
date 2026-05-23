<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EventCategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'admin'
        ]);
    }
    public function index()
    {
        $categories = EventCategory::latest()->get();

        return view(
            'categories.index',
            compact('categories')
        );
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        EventCategory::create([
            'name' => $request->name
        ]);

        return redirect('/categories')
            ->with(
                'success',
                'Thêm loại sự kiện thành công'
            );
    }
    public function show(string $id)
    {
        $category = EventCategory::findOrFail($id);

        return view(
            'categories.show',
            compact('category')
        );
    }
    public function edit(string $id)
    {
        $category = EventCategory::findOrFail($id);

        return view(
            'categories.edit',
            compact('category')
        );
    }
    public function update(
        Request $request,
        string $id
    ) {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category = EventCategory::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect('/categories')
            ->with(
                'success',
                'Cập nhật thành công'
            );
    }
    public function destroy(string $id)
    {
        $category = EventCategory::findOrFail($id);

        $category->delete();

        return redirect('/categories')
            ->with(
                'success',
                'Xóa thành công'
            );
    }
}