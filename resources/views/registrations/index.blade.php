@extends('layouts.app')

@section('content')

<div class="container mx-auto py-10">

    <h1 class="text-4xl font-bold mb-8">

        Đăng ký của tôi

    </h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="bg-green-500 text-white p-4 rounded mb-6">

            {{ session('success') }}

        </div>

    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="p-4 text-left">

                        ID

                    </th>

                    <th class="p-4 text-left">

                        Sự kiện

                    </th>

                    <th class="p-4 text-left">

                        Ngày đăng ký

                    </th>

                    <th class="p-4 text-left">

                        Trạng thái

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($registrations as $item)

                    <tr class="border-b hover:bg-gray-50">

                        {{-- ID --}}
                        <td class="p-4">

                            {{ $item->id }}

                        </td>

                        {{-- EVENT NAME --}}
                        <td class="p-4 font-semibold">

                            {{ $item->event->title ?? 'N/A' }}

                        </td>

                        {{-- CREATED DATE --}}
                        <td class="p-4">

                            {{ $item->created_at->format('d/m/Y') }}

                        </td>

                        {{-- STATUS --}}
                        <td class="p-4">

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
                            colspan="4"
                            class="p-6 text-center text-gray-500">

                            Chưa có đăng ký nào

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection