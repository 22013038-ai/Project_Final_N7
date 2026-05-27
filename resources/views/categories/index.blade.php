@extends('layouts.app')

@section('content')

<div class="container mx-auto py-10">

    <div class="flex justify-between mb-6">

        <h1 class="text-3xl font-bold">

            Loại sự kiện

        </h1>

        <a href="/categories/create"
           class="bg-blue-600 text-white px-4 py-2 rounded">

            Thêm loại

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full bg-white shadow rounded">

        <thead class="bg-gray-200">

            <tr>

                <th class="p-3 text-left">

                    ID

                </th>

                <th class="p-3 text-left">

                    Tên loại

                </th>

                <th class="p-3 text-left">

                    Hành động

                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($categories as $category)

                <tr class="border-b">

                    <td class="p-3">

                        {{ $category->id }}

                    </td>

                    <td class="p-3">

                        {{ $category->name }}

                    </td>

                    <td class="p-3 flex gap-2">

                        <a href="/categories/{{ $category->id }}/edit"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">

                            Sửa

                        </a>

                        <form
                            action="/categories/{{ $category->id }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-600 text-white px-3 py-1 rounded">

                                Xóa

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection