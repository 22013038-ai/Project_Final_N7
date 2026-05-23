@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    @if($event->image)

        <img
        src="{{ asset('uploads/'.$event->image) }}"
        class="w-full h-[500px] object-cover">

    @endif

    <div class="p-8">

        <h1 class="text-4xl font-bold mb-4">

            {{ $event->title }}

        </h1>

        <div class="grid md:grid-cols-2 gap-6 mb-6">

            <div>

                <p class="text-lg mb-3">

                     <strong>Địa điểm:</strong>

                    {{ $event->location }}

                </p>

                <p class="text-lg mb-3">

                     <strong>Ngày tổ chức:</strong>

                    {{ $event->event_date }}

                </p>

            </div>

            <div>

                <div
                class="bg-blue-100 p-4 rounded-lg">

                    <h3 class="font-bold text-xl mb-2">

                         Đếm ngược sự kiện

                    </h3>

                    <p id="countdown"
                       class="text-2xl text-red-600 font-bold">
                    </p>

                </div>

            </div>

        </div>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">

            Giới thiệu sự kiện

        </h2>

        <p class="leading-8 text-gray-700">

            {{ $event->description }}

        </p>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">

             Bản đồ địa điểm

        </h2>

        <iframe
        width="100%"
        height="400"
        style="border:0"
        loading="lazy"
        allowfullscreen
        src="https://maps.google.com/maps?q={{ urlencode($event->location) }}&output=embed">
        </iframe>

        <div class="mt-8 flex gap-3">

            @auth

            <form
            action="/register-event/{{ $event->id }}"
            method="POST">

                @csrf

                <button
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                     Đăng ký tham gia

                </button>

            </form>

            @endauth

            <a
            href="/"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">

                ← Quay lại

            </a>

        </div>

    </div>

</div>

<script>

const eventDate = new Date(
    "{{ $event->event_date }}"
).getTime();

const countdown = document.getElementById(
    "countdown"
);

setInterval(function(){

    const now = new Date().getTime();

    const distance = eventDate - now;

    const days = Math.floor(
        distance / (1000 * 60 * 60 * 24)
    );

    const hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24))
        / (1000 * 60 * 60)
    );

    const minutes = Math.floor(
        (distance % (1000 * 60 * 60))
        / (1000 * 60)
    );

    countdown.innerHTML =
        days + " ngày "
        + hours + " giờ "
        + minutes + " phút";

},1000);

</script>

@endsection