@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    @if($event->image)
        <img src="{{ asset('uploads/'.$event->image) }}"
             class="w-full h-[400px] object-cover">
    @endif

    <div class="p-8">

        <h1 class="text-4xl font-bold mb-4">
            {{ $event->title }}
        </h1>

        <div class="text-gray-600 space-y-2">
            <p>📍 {{ $event->location }}</p>
            <p>📅 {{ $event->event_date }}</p>
        </div>

        <p class="mt-6 text-gray-700 leading-relaxed">
            {{ $event->description }}
        </p>
        <div class="mt-8 bg-blue-50 p-5 rounded-xl text-center">

            <h2 class="text-xl font-bold mb-2">
                ⏳ Đếm ngược sự kiện
            </h2>

            <div id="countdown" class="text-2xl font-bold text-blue-600"></div>

        </div>

        @auth
        <form action="/register-event/{{ $event->id }}" method="POST" class="mt-6">
            @csrf
            <button class="bg-green-500 text-white px-6 py-3 rounded-lg">
                Đăng ký tham gia 🎉
            </button>
        </form>
        @endauth

    </div>
</div>
<script>
    const eventDate = new Date("{{ $event->event_date }}").getTime();

    const x = setInterval(function () {
        const now = new Date().getTime();
        const distance = eventDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000*60*60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000*60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            days + "d " + hours + "h " + minutes + "m " + seconds + "s";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "🔥 Đang diễn ra!";
        }
    }, 1000);
</script>

@endsection