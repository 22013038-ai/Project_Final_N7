<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý sự kiện & lễ hội du lịch</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

{{-- NAVBAR --}}
<nav class="bg-blue-700 shadow-lg text-white sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- LOGO --}}
        <a href="/" class="text-xl sm:text-2xl md:text-3xl font-bold hover:text-yellow-300 transition">
            Nhóm 7
        </a>

        {{-- MENU --}}
        <div class="flex flex-wrap justify-center md:justify-end items-center gap-3 md:gap-5 text-sm md:text-lg">

            <a href="/"
               class="hover:text-yellow-300 transition {{ request()->path() == '/' ? 'text-yellow-300 font-bold' : '' }}">
                Trang chủ
            </a>

            <a href="/events"
               class="hover:text-yellow-300 transition {{ request()->is('events*') ? 'text-yellow-300 font-bold' : '' }}">
                Sự kiện
            </a>

            @auth

                @if(auth()->user()->is_admin)

                    <a href="/events/create" class="hover:text-yellow-300 transition">
                        Thêm sự kiện
                    </a>

                    <a href="/dashboard" class="hover:text-yellow-300 transition">
                        Dashboard
                    </a>

                    <a href="/registrations" class="hover:text-yellow-300 transition">
                        Quản lý đăng ký
                    </a>

                @else

                    <a href="/my-registrations" class="hover:text-yellow-300 transition">
                        Đăng ký của tôi
                    </a>

                @endif

                {{-- PROFILE + AVATAR FIX --}}
                <a href="/profile"
                   class="flex items-center gap-2 bg-white/10 px-3 py-2 rounded-xl hover:bg-white/20 transition">

                    @if(auth()->user()->avatar)

                        <img src="{{ asset('uploads/avatars/' . auth()->user()->avatar) }}"
                             class="w-9 h-9 rounded-full object-cover border border-white">

                    @else

                        <div class="w-9 h-9 rounded-full bg-yellow-400 text-black flex items-center justify-center font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                    @endif

                    <span class="font-bold hidden sm:block">
                        {{ auth()->user()->name }}
                    </span>

                </a>

                {{-- LOGOUT --}}
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button class="hover:text-red-300 font-semibold">
                        Đăng xuất
                    </button>
                </form>

            @else

                <a href="/login" class="hover:text-yellow-300">Đăng nhập</a>
                <a href="/register" class="hover:text-yellow-300">Đăng ký</a>

            @endauth

        </div>

    </div>
</nav>

{{-- HERO --}}
@if(request()->path() == '/')

<section class="bg-cover bg-center h-[350px] md:h-[550px]"
         style="background-image:url('https://media.thuonghieucongluan.vn/uploads/2026/01/10/ph-1768025397.jpg');">

    <div class="bg-black/60 h-full flex items-center justify-center">

        <div class="text-center text-white px-6">

            <h1 class="text-2xl md:text-6xl font-bold mb-6">
                Hệ thống quản lý sự kiện<br>& lễ hội du lịch
            </h1>

            <p class="text-sm md:text-2xl mb-8">
                Khám phá lễ hội • Đăng ký dễ dàng • Trải nghiệm tuyệt vời
            </p>

            <a href="/events"
               class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-6 py-3 md:px-8 md:py-4 rounded-xl">
                Xem sự kiện
            </a>

        </div>

    </div>

</section>

@endif

{{-- MAIN --}}
<main class="max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-10 flex-grow w-full">

    @yield('content')

</main>

{{-- FOOTER --}}
<footer class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-500 text-white mt-10">

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-10">

        <div class="grid md:grid-cols-3 gap-10 text-center md:text-left">

            <div>
                <h3 class="text-2xl font-bold mb-4">Sự kiện du lịch</h3>
                <p>Hệ thống quản lý sự kiện và lễ hội du lịch.</p>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-4">Liên kết nhanh</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-yellow-300">Trang chủ</a></li>
                    <li><a href="/events" class="hover:text-yellow-300">Sự kiện</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-4">Liên hệ</h3>
                <p>nhom7-ltw2@phenikaa.com</p>
                <p>035 377 0240</p>
            </div>

        </div>

        <hr class="my-6 border-white/30">

        <div class="text-center">
            © {{ date('Y') }} Hệ thống quản lý sự kiện
        </div>

    </div>

</footer>

</body>
</html>