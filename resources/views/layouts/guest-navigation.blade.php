<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Lines -->
                <div id="lines" style=" display: flex; margin-left: 40px ">
                    <div id="line1" style=" width: 22px; background: #165397; transform: skewX(-45deg);"></div>
                    <div id="line2" style=" width: 22px; background: #165397; transform: skewX(-45deg); margin-left: 30px;"></div>
                </div>
            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6" >
                <a href="{{ route('login') }}" style="text-decoration: none; font-family: Impact; text-align: center; align-self: center; height: 50px; margin-left: 20px; padding: 13px; background: rgb(7, 128, 3); border-radius: 10px 20px; color: white;" onmouseover="this.style.background='black'" onmouseout="this.style.background='rgb(7, 128, 3)'" onclick="this.style.background='#ccc'; this.style.color='#fff';">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="text-decoration: none; font-family: Impact; text-align: center; align-self: center; height: 50px; margin-left: 20px; padding: 13px; background: rgb(7, 128, 3); border-radius: 10px 20px; color: white;" onmouseover="this.style.background='black'" onmouseout="this.style.background='rgb(7, 128, 3)'" onclick="this.style.background='#ccc'; this.style.color='#fff';">Register</a>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Log In') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
        </div>

    </div>
</nav>
