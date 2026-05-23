@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold mb-8">
        Dashboard Quản Trị
    </h1>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-blue-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold">
                Tổng sự kiện
            </h2>

            <p class="text-5xl mt-4">
                {{ $totalEvents }}
            </p>
        </div>

        <div class="bg-green-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold">
                Người dùng
            </h2>

            <p class="text-5xl mt-4">
                {{ $totalUsers }}
            </p>
        </div>

        <div class="bg-red-600 text-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold">
                Đăng ký
            </h2>

            <p class="text-5xl mt-4">
                {{ $totalRegistrations }}
            </p>
        </div>

    </div>

    <div class="bg-white mt-10 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-5">
             Sự kiện mới nhất
        </h2>

        <table class="w-full">

            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">
                        Tên sự kiện
                    </th>

                    <th class="p-3 text-left">
                        Địa điểm
                    </th>

                    <th class="p-3 text-left">
                        Ngày
                    </th>
                </tr>
            </thead>

            <tbody>

                @foreach($latestEvents as $event)

                <tr class="border-b">

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

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="bg-white mt-10 p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-5">
             Đăng ký gần đây
        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="p-3">
                        Event ID
                    </th>

                    <th class="p-3">
                        User ID
                    </th>

                    <th class="p-3">
                        Trạng thái
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($latestRegistrations as $item)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $item->event_id }}
                    </td>

                    <td class="p-3">
                        {{ $item->user_id }}
                    </td>

                    <td class="p-3">
                        {{ $item->status }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection