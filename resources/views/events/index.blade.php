@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    <h1 class="text-4xl font-bold mb-10 text-center">

        Danh sách sự kiện

    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($events as $event)

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            {{-- IMAGE --}}
            @if($event->images->count() > 0)

                <img
                    src="{{ asset('uploads/' . $event->images[0]->image) }}"
                    alt="event image"
                    class="w-full h-60 object-cover">

            @else

                <img
                    src="https://via.placeholder.com/600x300"
                    alt="no image"
                    class="w-full h-60 object-cover">

            @endif

            {{-- CONTENT --}}
            <div class="p-6">

                <h2 class="text-2xl font-bold mb-3 text-gray-800">

                    {{ $event->title }}

                </h2>

                <p class="text-gray-600 mb-2">

                     {{ $event->location }}

                </p>

                <p class="text-gray-500 mb-5">

                     {{ $event->event_date }}

                </p>

                <div class="flex gap-3">

                    {{-- DETAIL --}}
                    <a
                        href="/events/{{ $event->id }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">

                        Chi tiết

                    </a>

                    {{-- REGISTER --}}
                    @auth

                    <form
                        action="/register-event/{{ $event->id }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg transition">

                            Đăng ký

                        </button>

                    </form>

                    @endauth

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection