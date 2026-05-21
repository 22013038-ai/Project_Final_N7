<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Hệ thống quản lý sự kiện</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <nav class="bg-blue-600 text-white p-4">

        <div class="container mx-auto flex justify-between">

            <h1 class="text-2xl font-bold">

                🎉 Event Travel

            </h1>

            <div class="space-x-4">

                <a href="/"
                   class="hover:text-yellow-300">

                    Trang chủ

                </a>

                <a href="/events/create"
                   class="hover:text-yellow-300">

                    Thêm sự kiện

                </a>

                <a href="/dashboard"
                   class="hover:text-yellow-300">

                    Dashboard

                </a>

                @guest

                    <a href="/login">

                        Login

                    </a>

                    <a href="/register">

                        Register

                    </a>

                @endguest

                @auth

                    <a href="/my-registrations">

                        Đăng ký của tôi

                    </a>

                    <form
                    action="/logout"
                    method="POST"
                    class="inline">

                        @csrf

                        <button>

                            Logout

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </nav>

    <section class="bg-cover bg-center h-[350px]"
    style="background-image:url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070');">

        <div class="bg-black/50 h-full flex items-center justify-center">

            <div class="text-center text-white">

                <h1 class="text-5xl font-bold mb-4">

                    Hệ thống quản lý sự kiện
                    & lễ hội du lịch

                </h1>

                <p class="text-xl">

                    Khám phá lễ hội - Đăng ký dễ dàng 🎊

                </p>

            </div>

        </div>

    </section>

    <div class="container mx-auto py-10">

        @if(session('success'))

            <div class="bg-green-500 text-white p-4 mb-5 rounded">

                {{ session('success') }}

            </div>

        @endif

        @yield('content')

    </div>

    <footer class="bg-gray-900 text-white p-5 text-center">

        © 2026 Hệ thống quản lý sự kiện du lịch

    </footer>

</body>

</html>