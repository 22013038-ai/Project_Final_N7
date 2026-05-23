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
    <nav class="bg-blue-700 shadow-lg text-white">

        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/"
               class="text-3xl font-bold">

                 Nhóm 7

            </a>

            <div class="space-x-5 text-lg">

                <a href="/"
                   class="hover:text-yellow-300">

                    Trang chủ

                </a>

                <a href="/events"
                   class="hover:text-yellow-300">

                    Sự kiện

                </a>

                @auth

                    <a href="/events/create"
                       class="hover:text-yellow-300">

                         Thêm sự kiện

                    </a>

                    <a href="/dashboard"
                       class="hover:text-yellow-300">

                         Dashboard

                    </a>

                    <a href="/my-registrations"
                       class="hover:text-yellow-300">

                         Đăng ký của tôi

                    </a>

                    <span class="font-bold">

                         {{ auth()->user()->name }}

                    </span>

                    <form action="/logout"
                          method="POST"
                          class="inline">

                        @csrf

                        <button
                            class="hover:text-red-300">

                            Đăng xuất

                        </button>

                    </form>

                @else

                    <a href="/login"
                       class="hover:text-yellow-300">

                        Đăng nhập

                    </a>

                    <a href="/register"
                       class="hover:text-yellow-300">

                        Đăng ký

                    </a>

                @endauth

            </div>

        </div>

    </nav>

    @if(request()->path() == '/')

    <section
        class="bg-cover bg-center h-[550px]"
        style="background-image:url('https://media.thuonghieucongluan.vn/uploads/2026/01/10/ph-1768025397.jpg');">

        <div
            class="bg-black/60 h-full flex items-center justify-center">

            <div
                class="text-center text-white">

                <h1
                    class="text-6xl font-bold mb-6">

                    Hệ thống quản lý sự kiện
                    & lễ hội du lịch

                </h1>

                <p
                    class="text-2xl mb-8">

                    Khám phá lễ hội • Đăng ký dễ dàng • Trải nghiệm tuyệt vời

                </p>

                <a href="/events"
                   class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-8 py-4 rounded-lg">

                    Xem sự kiện

                </a>

            </div>

        </div>

    </section>

    @endif
    <main class="container mx-auto px-6 py-10 flex-grow">

        @if(session('success'))

            <div
                class="bg-green-500 text-white p-4 rounded-lg mb-6">

                {{ session('success') }}

            </div>

        @endif

        @if($errors->any())

            <div
                class="bg-red-500 text-white p-4 rounded-lg mb-6">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </main>
    <footer
        class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-500 text-white">

        <div
            class="container mx-auto px-6 py-10">

            <div
                class="grid md:grid-cols-3 gap-8">

                <div>

                    <h3
                        class="text-2xl font-bold mb-4">

                         Sự kiện du lịch

                    </h3>

                    <p>

                        Hệ thống quản lý sự kiện và lễ hội du lịch.

                    </p>

                    <p class="mt-2">

                        Khám phá • Đăng ký • Trải nghiệm

                    </p>

                </div>

                <div>

                    <h3
                        class="text-2xl font-bold mb-4">

                         Liên kết nhanh

                    </h3>

                    <ul class="space-y-2">

                        <li>

                            <a href="/"
                               class="hover:text-yellow-300">

                                Trang chủ

                            </a>

                        </li>

                        <li>

                            <a href="/events"
                               class="hover:text-yellow-300">

                                Danh sách sự kiện

                            </a>

                        </li>

                        <li>

                            <a href="/events/create"
                               class="hover:text-yellow-300">

                                Thêm sự kiện

                            </a>

                        </li>

                        <li>

                            <a href="/dashboard"
                               class="hover:text-yellow-300">

                                Dashboard

                            </a>

                        </li>

                    </ul>

                </div>

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

            <div
                class="text-center text-lg">

                © 2026 Hệ thống quản lý sự kiện & lễ hội du lịch

            </div>

        </div>

    </footer>

</body>

</html>