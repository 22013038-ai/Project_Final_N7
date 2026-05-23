@extends('layouts.app')

@section('content')

<div class="container mx-auto py-8">

    {{-- Tiêu đề --}}
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Quản lý đăng ký sự kiện
        </h1>

    </div>


    {{-- Thông báo thành công --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif


    {{-- Bảng --}}
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">

        <table class="w-full border-collapse">

            {{-- Header --}}
            <thead class="bg-gray-200 text-gray-700">

                <tr>

                    <th class="p-4 text-left">
                        ID
                    </th>

                    <th class="p-4 text-left">
                        Người dùng
                    </th>

                    <th class="p-4 text-left">
                        Sự kiện
                    </th>

                    <th class="p-4 text-left">
                        Trạng thái
                    </th>

                    <th class="p-4 text-left">
                        Ngày đăng ký
                    </th>

                    <th class="p-4 text-center">
                        Hành động
                    </th>

                </tr>

            </thead>


            {{-- Body --}}
            <tbody>

                @forelse($registrations as $registration)

                    <tr class="border-b hover:bg-gray-50">

                        {{-- ID --}}
                        <td class="p-4">

                            {{ $registration->id }}

                        </td>


                        {{-- User --}}
                        <td class="p-4">

                            {{ $registration->user->name ?? 'N/A' }}

                        </td>


                        {{-- Event --}}
                        <td class="p-4">

                            {{ $registration->event->title ?? 'N/A' }}

                        </td>


                        {{-- Status --}}
                        <td class="p-4">

                            @if($registration->status == 'pending')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                    Chờ duyệt

                                </span>

                            @elseif($registration->status == 'approved')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                    Đã duyệt

                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                    Đã hủy

                                </span>

                            @endif

                        </td>


                        {{-- Date --}}
                        <td class="p-4">

                            {{ $registration->created_at->format('d/m/Y H:i') }}

                        </td>


                        {{-- Actions --}}
                        <td class="p-4">

                            @if($registration->status == 'pending')

                                <div class="flex gap-2">

                                    {{-- Duyệt --}}
                                    <form
                                        action="{{ route('registrations.approve', $registration->id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
                                        >

                                            Duyệt

                                        </button>

                                    </form>


                                    {{-- Hủy --}}
                                    <form
                                        action="{{ route('registrations.cancel', $registration->id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded"
                                        >

                                            Hủy

                                        </button>

                                    </form>

                                </div>

                            @else

                                <span class="text-gray-400 italic">

                                    Không có thao tác

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center p-8 text-gray-500"
                        >

                            Chưa có đăng ký nào

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection