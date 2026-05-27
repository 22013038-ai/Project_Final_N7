@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10">

    {{-- PROFILE CARD --}}
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

        {{-- HEADER --}}
        <div
            class="bg-gradient-to-r from-blue-600 to-purple-600 p-8 text-white">

            <div
                class="flex flex-col md:flex-row items-center gap-6">

                {{-- AVATAR --}}
                <div>

                    @if(auth()->user()->avatar)

                        <img
                            src="{{ asset('uploads/avatars/' . auth()->user()->avatar) }}"
                            class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">

                    @else

                        <div
                            class="w-24 h-24 rounded-full bg-white text-blue-600 flex items-center justify-center text-4xl font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    @endif

                </div>

                {{-- INFO --}}
                <div class="text-center md:text-left">

                    <h1 class="text-3xl font-bold">

                        {{ auth()->user()->name }}

                    </h1>

                    <p class="mt-2 text-lg">

                        {{ auth()->user()->email }}

                    </p>

                    <span
                        class="inline-block mt-3 bg-white text-blue-600 px-4 py-1 rounded-full font-semibold">

                        @if(auth()->user()->is_admin)

                            Admin

                        @else

                            Thành viên

                        @endif

                    </span>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-8 space-y-10">

            {{-- UPLOAD AVATAR --}}
            <div
                class="bg-gray-50 rounded-xl p-6 shadow">

                <h2
                    class="text-2xl font-bold mb-6">

                    Cập nhật ảnh đại diện

                </h2>

                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="mb-6">

                        <input
                            type="file"
                            name="avatar"
                            class="w-full border border-gray-300 rounded-lg p-3">

                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">

                        Lưu ảnh đại diện

                    </button>

                </form>

            </div>

            {{-- UPDATE PROFILE --}}
            <div
                class="bg-gray-50 rounded-xl p-6 shadow">

                <h2
                    class="text-2xl font-bold mb-6">

                    Thông tin tài khoản

                </h2>

                @include('profile.partials.update-profile-information-form')

            </div>

            {{-- UPDATE PASSWORD --}}
            <div
                class="bg-gray-50 rounded-xl p-6 shadow">

                <h2
                    class="text-2xl font-bold mb-6">

                    Đổi mật khẩu

                </h2>

                @include('profile.partials.update-password-form')

            </div>

            {{-- DELETE ACCOUNT --}}
            <div
                class="bg-red-50 rounded-xl p-6 shadow">

                <h2
                    class="text-2xl font-bold text-red-600 mb-6">

                    Xóa tài khoản

                </h2>

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</div>

@endsection