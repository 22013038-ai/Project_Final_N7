@extends('layouts.app')

@section('content')

<div class="container mx-auto py-10">

    <div class="bg-white p-6 rounded shadow">

        <h1 class="text-3xl font-bold mb-6">

            Thêm loại sự kiện

        </h1>

        <form
            action="/categories"
            method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">

                    Tên loại

                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded px-4 py-2">

            </div>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded">

                Thêm

            </button>

        </form>

    </div>

</div>

@endsection