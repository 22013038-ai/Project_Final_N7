<nav class="bg-blue-700 shadow-lg">

    <div class="container mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            <div>

                <a href="/"
                   class="text-white text-2xl font-bold">

                     Nhóm 7

                </a>

            </div>

    
            <div class="flex items-center space-x-6">

                <a href="/"
                   class="text-white hover:text-yellow-300 transition">

                    Trang chủ

                </a>

                <a href="/events"
                   class="text-white hover:text-yellow-300 transition">

                    Sự kiện

                </a>

                @auth

                    <a href="/events/create"
                       class="text-white hover:text-yellow-300 transition">

                         Thêm sự kiện

                    </a>

                    <a href="/dashboard"
                       class="text-white hover:text-yellow-300 transition">

                         Dashboard

                    </a>

                    <a href="/my-registrations"
                       class="text-white hover:text-yellow-300 transition">

                         Đăng ký của tôi

                    </a>

                    <span class="text-white font-semibold">

                         {{ Auth::user()->name }}

                    </span>

                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="inline">

                        @csrf

                        <button
                            type="submit"
                            class="text-white hover:text-red-300 transition">

                            Logout

                        </button>

                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="text-white hover:text-yellow-300 transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="text-white hover:text-yellow-300 transition">

                        Register

                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>