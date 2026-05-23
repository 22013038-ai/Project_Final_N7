@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

    Danh sách sự kiện 

</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach($events as $event)

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        @if($event->image)

            <img
            src="{{ asset('uploads/'.$event->image) }}"
            class="w-full h-56 object-cover">

        @endif

        <div class="p-5">

            <h2 class="text-2xl font-bold mb-2">

                {{ $event->title }}

            </h2>

            <p class="text-gray-600">

                 {{ $event->location }}

            </p>

            <p class="text-gray-600">

                 {{ $event->event_date }}

            </p>

            <div class="mt-4 flex gap-2">

                <a
                href="/events/{{ $event->id }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">

                    Chi tiết

                </a>

                @auth

                <form
                action="/register-event/{{ $event->id }}"
                method="POST">

                    @csrf

                    <button
                    class="bg-green-500 text-white px-4 py-2 rounded">

                        Đăng ký

                    </button>

                </form>

                @endauth

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection