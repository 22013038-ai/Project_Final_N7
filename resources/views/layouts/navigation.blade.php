<nav class="bg-blue-700 shadow-lg">

    <div class="container mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <div>

                <a href="/"
                   class="text-white text-2xl font-bold">

                    Nhóm 7

                </a>

            </div>

            {{-- Menu --}}
            <div class="flex items-center space-x-6">

                {{-- Trang chủ --}}
                <a href="/"
                   class="text-white hover:text-yellow-300 transition">

                    Trang chủ

                </a>

                {{-- Danh sách sự kiện --}}
                <a href="/events"
                   class="text-white hover:text-yellow-300 transition">

                    Sự kiện

                </a>

                @auth

                    {{-- MENU ADMIN --}}
                    @if(auth()->user()->role == 'admin')

                        {{-- Thêm sự kiện --}}
                        <a href="/events/create"
                           class="text-white hover:text-yellow-300 transition">

                            Thêm sự kiện

                        </a>

                        {{-- Dashboard --}}
                        <a href="/dashboard"
                           class="text-white hover:text-yellow-300 transition">

                            Dashboard

                        </a>

                        {{-- Quản lý đăng ký --}}
                        <a href="/registrations"
                           class="text-white hover:text-yellow-300 transition">

                            Quản lý đăng ký

                        </a>

                        {{-- Quản lý category --}}
                        <a href="/categories"
                           class="text-white hover:text-yellow-300 transition">

                            Loại sự kiện

                        </a>

                    @endif

                    {{-- USER MENU --}}
                    <a href="/my-registrations"
                       class="text-white hover:text-yellow-300 transition">

                        Đăng ký của tôi

                    </a>

                    {{-- Username --}}
                    <span class="text-white font-semibold">

                        {{ Auth::user()->name }}

                    </span>

                    {{-- Logout --}}
                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="inline">

                        @csrf

                        <button
                            type="submit"
                            class="text-white hover:text-red-300 transition">

                            Đăng xuất

                        </button>

                    </form>

                @else

                    {{-- Login --}}
                    <a href="{{ route('login') }}"
                       class="text-white hover:text-yellow-300 transition">

                        Đăng nhập

                    </a>

                    {{-- Register --}}
                    <a href="{{ route('register') }}"
                       class="text-white hover:text-yellow-300 transition">

                        Đăng ký

                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>