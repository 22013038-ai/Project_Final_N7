@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Đăng ký của tôi
</h1>

<table class="w-full bg-white shadow rounded">

    <thead>

        <tr class="bg-blue-600 text-white">

            <th class="p-3">ID</th>
            <th class="p-3">Sự kiện</th>
            <th class="p-3">Trạng thái</th>

        </tr>

    </thead>

    <tbody>

        @forelse($registrations as $item)

        <tr class="border-b">

            <td class="p-3">
                {{ $item->id }}
            </td>

            <td class="p-3">
                {{ $item->event_id }}
            </td>

            <td class="p-3">
                {{ $item->status }}
            </td>

        </tr>

        @empty

        <tr>

            <td colspan="3" class="p-4 text-center">

                Chưa có đăng ký nào

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection