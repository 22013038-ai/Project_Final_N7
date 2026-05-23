@extends('layouts.app')

@section('content')

<div class="container mx-auto py-8">

    <h1 class="text-3xl font-bold mb-6">

        Quản lý đăng ký sự kiện

    </h1>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="w-full border-collapse">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">
                        ID
                    </th>

                    <th class="p-3 text-left">
                        Người dùng
                    </th>

                    <th class="p-3 text-left">
                        Sự kiện
                    </th>

                    <th class="p-3 text-left">
                        Trạng thái
                    </th>

                    <th class="p-3 text-left">
                        Ngày đăng ký
                    </th>

                    <th class="p-3 text-left">
                        Hành động
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($registrations as $registration)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $registration->id }}

                        </td>

                        <td class="p-3">

                            {{ $registration->user->name ?? 'N/A' }}

                        </td>

                        <td class="p-3">

                            {{ $registration->event->title ?? 'N/A' }}

                        </td>

                        <td class="p-3">

                            {{ $registration->status }}

                        </td>

                        <td class="p-3">

                            {{ $registration->created_at }}

                        </td>

                        <td class="p-3 flex gap-2">

                            {{-- Duyệt --}}
                            <form
                                action="/registrations/{{ $registration->id }}/approve"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="bg-green-600 text-white px-3 py-1 rounded">

                                    Duyệt

                                </button>

                            </form>

                            {{-- Hủy --}}
                            <form
                                action="/registrations/{{ $registration->id }}/cancel"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded">

                                    Hủy

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center p-6">

                            Chưa có đăng ký nào

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection