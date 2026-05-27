<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventImage;

class EventController extends Controller
{

    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->location) {

            $query->where(
                'location',
                'like',
                '%' . $request->location . '%'
            );
        }
        if ($request->event_date) {

            $query->whereDate(
                'event_date',
                $request->event_date
            );
        }

        $events = $query->latest()->get();

        return view(
            'events.index',
            compact('events')
        );
    }

    public function create()
    {
        $categories = EventCategory::all();

        return view(
            'events.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required',

            'title' => 'required|max:255',

            'location' => 'required|max:255',

            'event_date' => 'required|date',

            'description' => 'required',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $event = Event::create([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'location' => $request->location,

            'event_date' => $request->event_date,

            'description' => $request->description,

            'image' => null

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $imageName =
                    time() . '_' . uniqid() . '.' . $image->extension();

                $image->move(
                    public_path('uploads'),
                    $imageName
                );

                EventImage::create([

                    'event_id' => $event->id,

                    'image' => $imageName

                ]);
            }
        }

        return redirect('/')
            ->with(
                'success',
                'Thêm sự kiện thành công'
            );
    }

    public function show($id)
    {
        $event = Event::with('images')
            ->findOrFail($id);

        return view(
            'events.show',
            compact('event')
        );
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $categories = EventCategory::all();

        return view(
            'events.edit',
            compact(
                'event',
                'categories'
            )
        );
    }


    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([

            'category_id' => 'required',

            'title' => 'required|max:255',

            'location' => 'required|max:255',

            'event_date' => 'required|date',

            'description' => 'required',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $event->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'location' => $request->location,

            'event_date' => $request->event_date,

            'description' => $request->description

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $imageName =
                    time() . '_' . uniqid() . '.' . $image->extension();

                $image->move(
                    public_path('uploads'),
                    $imageName
                );

                EventImage::create([

                    'event_id' => $event->id,

                    'image' => $imageName

                ]);
            }
        }

        return redirect('/')
            ->with(
                'success',
                'Cập nhật sự kiện thành công'
            );
    }

    public function destroy($id)
    {
        $event = Event::with('images')
            ->findOrFail($id);
        if (
            $event->image &&
            file_exists(
                public_path('uploads/' . $event->image)
            )
        ) {

            unlink(
                public_path('uploads/' . $event->image)
            );
        }
        foreach ($event->images as $img) {

            if (
                file_exists(
                    public_path('uploads/' . $img->image)
                )
            ) {

                unlink(
                    public_path('uploads/' . $img->image)
                );
            }

            $img->delete();
        }

        $event->delete();

        return redirect('/')
            ->with(
                'success',
                'Xóa sự kiện thành công'
            );
    }
}