@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

    Dashboard Admin

</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- USERS --}}
    <div
        class="bg-blue-500 text-white p-6 rounded-2xl shadow hover:scale-105 transition">

        <h2 class="text-xl">
            Người dùng
        </h2>

        <p class="text-5xl font-bold mt-4">

            {{ $totalUsers }}

        </p>

    </div>


    {{-- EVENTS --}}
    <div
        class="bg-green-500 text-white p-6 rounded-2xl shadow hover:scale-105 transition">

        <h2 class="text-xl">
            Sự kiện
        </h2>

        <p class="text-5xl font-bold mt-4">

            {{ $totalEvents }}

        </p>

    </div>


    {{-- REGISTRATIONS --}}
    <div
        class="bg-red-500 text-white p-6 rounded-2xl shadow hover:scale-105 transition">

        <h2 class="text-xl">
            Đăng ký
        </h2>

        <p class="text-5xl font-bold mt-4">

            {{ $totalRegistrations }}

        </p>

    </div>

</div>

@endsection