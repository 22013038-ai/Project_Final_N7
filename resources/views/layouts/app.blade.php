<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>

        Hệ thống quản lý sự kiện & lễ hội du lịch

    </title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-blue-700 shadow-lg text-white sticky top-0 z-50">

        <div
            class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- LOGO --}}
            <a href="/"
               class="text-3xl font-bold hover:text-yellow-300 transition">

                Nhóm 7

            </a>


            {{-- MENU --}}
            <div class="flex items-center gap-6 text-lg">

                {{-- HOME --}}
                <a href="/"
                   class="
                   hover:text-yellow-300 transition
                   {{ Request::is('/') ? 'text-yellow-300 font-bold' : '' }}
                   ">

                    Trang chủ

                </a>


                {{-- EVENTS --}}
                <a href="/events"
                   class="
                   hover:text-yellow-300 transition
                   {{ request()->is('events*') ? 'text-yellow-300 font-bold' : '' }}
                   ">

                    Sự kiện

                </a>


                @auth

                    {{-- ADMIN MENU --}}
                    @if(auth()->check() && auth()->user()->is_admin)

                        {{-- CREATE EVENT --}}
                        <a href="/events/create"
                           class="
                           hover:text-yellow-300 transition
                           {{ request()->is('events/create') ? 'text-yellow-300 font-bold' : '' }}
                           ">

                            Thêm sự kiện

                        </a>


                        {{-- DASHBOARD --}}
                        <a href="/dashboard"
                           class="
                           hover:text-yellow-300 transition
                           {{ request()->is('dashboard') ? 'text-yellow-300 font-bold' : '' }}
                           ">

                            Dashboard

                        </a>


                        {{-- REGISTRATION MANAGEMENT --}}
                        <a href="/registrations"
                           class="
                           hover:text-yellow-300 transition
                           {{ request()->is('registrations*') ? 'text-yellow-300 font-bold' : '' }}
                           ">

                            Quản lý đăng ký

                        </a>

                    @else

                        {{-- MEMBER --}}
                        <a href="/my-registrations"
                           class="
                           hover:text-yellow-300 transition
                           {{ request()->is('my-registrations') ? 'text-yellow-300 font-bold' : '' }}
                           ">

                            Đăng ký của tôi

                        </a>

                    @endif


                    {{-- USER --}}
                    <div class="flex items-center gap-3">

                        {{-- AVATAR --}}
                        <div
                            class="w-10 h-10 rounded-full bg-yellow-400 text-black flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>


                        {{-- NAME --}}
                        <span class="font-bold">

                            {{ auth()->user()->name }}

                        </span>

                    </div>


                    {{-- LOGOUT --}}
                    <form action="/logout"
                          method="POST"
                          class="inline">

                        @csrf

                        <button
                            type="submit"
                            class="hover:text-red-300 transition font-semibold">

                            Đăng xuất

                        </button>

                    </form>

                @else

                    {{-- LOGIN --}}
                    <a href="/login"
                       class="hover:text-yellow-300 transition">

                        Đăng nhập

                    </a>


                    {{-- REGISTER --}}
                    <a href="/register"
                       class="hover:text-yellow-300 transition">

                        Đăng ký

                    </a>

                @endauth

            </div>

        </div>

    </nav>


    {{-- HERO --}}
    @if(Request::is('/'))

        <section
            class="bg-cover bg-center h-[550px]"
            style="background-image:url('https://media.thuonghieucongluan.vn/uploads/2026/01/10/ph-1768025397.jpg');">

            <div
                class="bg-black/60 h-full flex items-center justify-center">

                <div
                    class="text-center text-white px-6">

                    <h1
                        class="text-3xl md:text-6xl font-bold mb-6 leading-tight">

                        Hệ thống quản lý sự kiện
                        <br>
                        & lễ hội du lịch

                    </h1>


                    <p
                        class="text-lg md:text-2xl mb-8">

                        Khám phá lễ hội • Đăng ký dễ dàng •
                        Trải nghiệm tuyệt vời

                    </p>


                    <a href="/events"
                       class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-8 py-4 rounded-xl transition duration-300 shadow-lg">

                        Xem sự kiện

                    </a>

                </div>

            </div>

        </section>

    @endif


    {{-- MAIN --}}
    <main
        class="max-w-7xl mx-auto px-6 py-10 flex-grow w-full">

        {{-- SUCCESS --}}
        @if(session('success'))

            <div
                class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl mb-6 shadow">

                {{ session('success') }}

            </div>

        @endif


        {{-- ERROR --}}
        @if(session('error'))

            <div
                class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl mb-6 shadow">

                {{ session('error') }}

            </div>

        @endif


        {{-- VALIDATION ERRORS --}}
        @if($errors->any())

            <div
                class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl mb-6 shadow">

                <ul class="list-disc pl-5 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- PAGE CONTENT --}}
        @yield('content')

    </main>


    {{-- FOOTER --}}
    <footer
        class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-500 text-white mt-10">

        <div
            class="max-w-7xl mx-auto px-6 py-10">

            <div
                class="grid md:grid-cols-3 gap-10">

                {{-- ABOUT --}}
                <div>

                    <h3
                        class="text-2xl font-bold mb-4">

                        Sự kiện du lịch

                    </h3>

                    <p class="leading-7">

                        Hệ thống quản lý sự kiện và lễ hội du lịch,
                        giúp người dùng dễ dàng khám phá và đăng ký
                        các sự kiện nổi bật trên toàn quốc.

                    </p>

                </div>


                {{-- QUICK LINKS --}}
                <div>

                    <h3
                        class="text-2xl font-bold mb-4">

                        Liên kết nhanh

                    </h3>

                    <ul class="space-y-3">

                        <li>

                            <a href="/"
                               class="hover:text-yellow-300 transition">

                                Trang chủ

                            </a>

                        </li>

                        <li>

                            <a href="/events"
                               class="hover:text-yellow-300 transition">

                                Danh sách sự kiện

                            </a>

                        </li>

                        @auth

                            @if(auth()->check() && auth()->user()->is_admin)

                                <li>

                                    <a href="/dashboard"
                                       class="hover:text-yellow-300 transition">

                                        Dashboard

                                    </a>

                                </li>

                            @endif

                        @endauth

                    </ul>

                </div>


                {{-- CONTACT --}}
                <div>

                    <h3
                        class="text-2xl font-bold mb-4">

                        Liên hệ

                    </h3>

                    <p>

                        nhom7-ltw2@phenikaa.com

                    </p>

                    <p class="mt-2">

                        Đại học Phenikaa

                    </p>

                    <p class="mt-2">

                        035 377 0240

                    </p>

                </div>

            </div>


            <hr class="my-6 border-white/30">


            {{-- COPYRIGHT --}}
            <div
                class="text-center text-lg">

                © {{ date('Y') }}
                Hệ thống quản lý sự kiện & lễ hội du lịch

            </div>

        </div>

    </footer>

</body>

</html>