<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\EventCategory;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::latest()->get();

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

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imageName = null;

        if($request->hasFile('image')){

            $imageName = time().'.'.
                $request->image->extension();

            $request->image->move(

                public_path('uploads'),

                $imageName

            );
        }

        Event::create([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'location' => $request->location,

            'event_date' => $request->event_date,

            'description' => $request->description,

            'image' => $imageName

        ]);

        return redirect('/')
            ->with(
                'success',
                'Thêm sự kiện thành công 🎉'
            );
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

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

            'description' => 'required'

        ]);

        $imageName = $event->image;

        if($request->hasFile('image')){

            $imageName = time().'.'.
                $request->image->extension();

            $request->image->move(

                public_path('uploads'),

                $imageName

            );
        }

        $event->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'location' => $request->location,

            'event_date' => $request->event_date,

            'description' => $request->description,

            'image' => $imageName

        ]);

        return redirect('/')
            ->with(
                'success',
                'Cập nhật sự kiện thành công 🚀'
            );
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if(

            $event->image &&

            file_exists(
                public_path(
                    'uploads/'.$event->image
                )
            )

        ){

            unlink(

                public_path(
                    'uploads/'.$event->image
                )

            );
        }

        $event->delete();

        return redirect('/')
            ->with(
                'success',
                'Xóa sự kiện thành công ❌'
            );
    }
}