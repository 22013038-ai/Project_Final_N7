@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-10">

    {{-- TITLE --}}
    <h1 class="text-4xl font-bold mb-8">

        Dashboard Quản Trị

    </h1>

    {{-- STATISTICS --}}
    <div class="grid md:grid-cols-4 gap-6">

        {{-- Tổng sự kiện --}}
        <div class="bg-blue-600 text-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold">

                Tổng sự kiện

            </h2>

            <p class="text-5xl mt-4">

                {{ $totalEvents }}

            </p>

        </div>

        {{-- Tổng user --}}
        <div class="bg-green-600 text-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold">

                Người dùng

            </h2>

            <p class="text-5xl mt-4">

                {{ $totalUsers }}

            </p>

        </div>

        {{-- Tổng đăng ký --}}
        <div class="bg-yellow-500 text-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold">

                Đăng ký

            </h2>

            <p class="text-5xl mt-4">

                {{ $totalRegistrations }}

            </p>

        </div>

        {{-- Chờ duyệt --}}
        <div class="bg-red-600 text-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold">

                Chờ duyệt

            </h2>

            <p class="text-5xl mt-4">

                {{ $pendingRegistrations }}

            </p>

        </div>

    </div>

    {{-- EVENT TABLE --}}
    <div class="bg-white mt-10 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-5">

            Sự kiện mới nhất

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b bg-gray-100">

                    <th class="p-3 text-left">

                        Tên sự kiện

                    </th>

                    <th class="p-3 text-left">

                        Địa điểm

                    </th>

                    <th class="p-3 text-left">

                        Ngày diễn ra

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($latestEvents as $event)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">

                            {{ $event->title }}

                        </td>

                        <td class="p-3">

                            {{ $event->location }}

                        </td>

                        <td class="p-3">

                            {{ $event->event_date }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="3"
                            class="text-center p-6 text-gray-500">

                            Chưa có sự kiện nào

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- REGISTRATION TABLE --}}
    <div class="bg-white mt-10 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-5">

            Đăng ký gần đây

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b bg-gray-100">

                    <th class="p-3 text-left">

                        Người dùng

                    </th>

                    <th class="p-3 text-left">

                        Sự kiện

                    </th>

                    <th class="p-3 text-left">

                        Trạng thái

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($latestRegistrations as $item)

                    <tr class="border-b hover:bg-gray-50">

                        {{-- User --}}
                        <td class="p-3">

                            {{ $item->user->name ?? 'N/A' }}

                        </td>

                        {{-- Event --}}
                        <td class="p-3">

                            {{ $item->event->title ?? 'N/A' }}

                        </td>

                        {{-- Status --}}
                        <td class="p-3">

                            @if($item->status == 'pending')

                                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded">

                                    Chờ duyệt

                                </span>

                            @elseif($item->status == 'approved')

                                <span class="bg-green-200 text-green-800 px-3 py-1 rounded">

                                    Đã duyệt

                                </span>

                            @else

                                <span class="bg-red-200 text-red-800 px-3 py-1 rounded">

                                    Đã hủy

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="3"
                            class="text-center p-6 text-gray-500">

                            Chưa có đăng ký nào

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection