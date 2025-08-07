<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="">
                        <img src="/img/logo.png" alt="Your Company" class="size-10" />
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-main-nav-link href="/" :current="request()->is('/')">Home</x-main-nav-link>
                        <x-main-nav-link href="/about" :current="request()->is('about')">About</x-main-nav-link>
                        <x-main-nav-link href="/posts" :current="request()->is('posts')">Blog</x-main-nav-link>
                        <x-main-nav-link href="/contact" :current="request()->is('contact')">Contact</x-main-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <el-dropdown class="relative ml-3">
                        @if (Auth::check())
                            <div class="flex">
                                <button type="button"
                                    class="hover:ring-2 hover:ring-white hover:ring-offset-2 hover:ring-offset-gray-800
                                        focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm  cursor-pointer">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img src="/img/pp.jpg" alt="profile" class="size-10 rounded-full " />
                                    <div class="ml-4 text-gray-300 text-md my-auto">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="ms-1 text-gray-300">
                                        <svg class="ml-4 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </div>

                            <el-menu anchor="bottom end" popover
                                class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] focus:outline-hidden data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in cursor-pointer">
                                <a href="/profile"
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your
                                    Profile</a>
                                <a href="/dashboard"
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Settings</a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="block text-left px-4 w-full py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Log
                                        out</button>
                                </form>

                            </el-menu>
                        @else
                            <div class="flex gap-4">
                                <div
                                    class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="/login" class="text-white">Login</a>
                                </div>
                                <div
                                    class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="/register" class="text-white">Register</a>
                                </div>
                            </div>
                        @endif
                    </el-dropdown>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" command="--toggle" commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-main-nav-link class="block" href="/" :current="request()->is('/')">Home</x-main-nav-link>
            <x-main-nav-link class="block" href="/about" :current="request()->is('about')">About</x-main-nav-link>
            <x-main-nav-link class="block" href="/posts" :current="request()->is('posts')">Blog</x-main-nav-link>
            <x-main-nav-link class="block" href="/contact" :current="request()->is('contact')">Contact</x-main-nav-link>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            @if (Auth::check())
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="/img/pp.jpg" alt="{{ Auth::user()->name }}" class="size-10 rounded-full" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="/profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Log
                            out</button>
                    </form>
                </div>
            @else
                <div class="space-y-1 px-2">
                    <a href="/login"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
                    <a href="/register"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Register</a>
                </div>
        </div>
        @endif

    </el-disclosure>
</nav>
