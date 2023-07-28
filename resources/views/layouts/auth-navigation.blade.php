@php
    use Carbon\Carbon;
    use \App\Models\User;
@endphp

<nav x-data="{ open: false }" class=" bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex px-auto justify-between h-20">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="/">
                    <x-application-logo class="block fill-current text-gray-800"/>
                </a>
            </div>
            <div class="flex">



                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link title="Leagues" :href="route('leagues')" :active="request()->routeIs('leagues') ">
                        <x-nav-icon >
                            <i class="fas fa-solid fa-trophy"></i>
                        </x-nav-icon>
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link title="Teams"  :href="route('teams')" :active="request()->routeIs('teams') ">
                        <x-nav-icon >
                            <svg height="1.5em" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 57.439 57.439" xml:space="preserve" fill="#a1a1a1" stroke="#a1a1a1" stroke-width="0.00057439" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path style="fill:#757575;" d="M16.674,12.702c3.807-2.249,7.797-3.388,11.885-3.39c5.597,0,10.098,2.148,12.207,3.373v12.889 h3.285V10.895c0,0-6.408-4.868-15.494-4.868c-4.542,0.002-9.754,1.218-15.168,4.868v14.679h3.285L16.674,12.702L16.674,12.702z"></path> <polygon style="fill:#757575;" points="28.72,46.597 21.115,38.449 16.621,38.449 28.72,51.413 40.818,38.449 36.325,38.449 "></polygon> <path style="fill:#757575;" d="M57.439,38.893l-2.847-4.052l2.841-4.078H46.107V26.82H11.511v3.943H0.006l2.841,4.078L0,38.893 h12.89v-1.388h31.66v1.388H57.439z M11.644,37.648H2.398l1.97-2.801l-1.976-2.836h9.119v5.494h0.133L11.644,37.648L11.644,37.648 z M45.795,37.506h0.313v-5.494h8.938l-1.974,2.838l1.968,2.8h-9.246L45.795,37.506L45.795,37.506z"></path> </g> </g> </g> </g></svg>
                        </x-nav-icon>
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link title="Matches"  :href="route('matches', ['matche' => Carbon::now()->format('Y-m-d')])" :active="request()->routeIs('matches') ">
                        <x-nav-icon >
                            <i class="fas fa-regular fa-clock"></i>
                        </x-nav-icon>
                    </x-nav-link>
                </div>

                @if(Auth::user()->role == User::ADMIN)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link  :href="route('admin_dashboard')" :active="request()->routeIs('admin_dashboard') ">
                            <x-nav-icon >
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg>
                            </x-nav-icon>
                        </x-nav-link>
                    </div>
                @endif



            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <img src="{{ (!empty(Auth::user()->image)) ? asset('profile-images/'.Auth::user()->image) : asset('avatars/avatar-'. auth()->id() .'.png')  }}" style="border-radius: 50%" width="40" alt="PF">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="font-bold text-sm">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('leagues')" :active="request()->routeIs('leagues')">
                <x-nav-icon>
                    <i class="fas fa-solid fa-trophy"></i>
                </x-nav-icon>
                {{ __('Leagues') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('teams')" :active="request()->routeIs('teams')">
                <x-nav-icon>
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"><path d="M2405 4935 c-540 -242 -1222 -415 -1641 -415 -33 0 -65 -5 -72 -12 -19 -19 -17 -2005 3 -2151 16 -119 60 -297 100 -396 14 -36 25 -68 25 -73 0 -4 -26 -8 -58 -8 -32 0 -63 -5 -70 -12 -8 -8 -12 -67 -12 -200 l0 -188 -268 0 c-272 0 -292 -3 -292 -38 0 -7 52 -101 116 -208 l117 -194 -117 -194 c-64 -107 -116 -201 -116 -208 0 -37 9 -38 600 -38 435 0 579 3 588 12 8 8 12 67 12 200 l0 188 58 0 57 0 75 -77 c164 -167 396 -364 630 -534 145 -105 400 -269 419 -269 34 0 361 219 572 383 186 145 294 239 435 378 l121 119 56 0 57 0 0 -188 c0 -133 4 -192 12 -200 9 -9 153 -12 588 -12 591 0 600 1 600 38 0 7 -52 101 -116 208 l-117 194 117 194 c64 107 116 201 116 208 0 35 -20 38 -292 38 l-268 0 0 188 c0 133 -4 192 -12 200 -7 7 -38 12 -70 12 -32 0 -58 4 -58 8 0 5 11 37 25 73 40 99 84 277 100 396 20 146 22 2132 3 2151 -7 7 -39 12 -72 12 -428 0 -1115 176 -1676 430 -62 27 -117 50 -123 49 -7 -1 -75 -29 -152 -64z m277 -74 c537 -234 1067 -377 1521 -412 l158 -12 -4 -1036 c-3 -1024 -3 -1037 -25 -1132 -26 -116 -54 -208 -94 -311 l-29 -78 -90 0 -90 0 17 31 c58 113 117 308 139 464 20 138 22 1887 2 1903 -6 6 -57 15 -112 21 -414 46 -896 178 -1364 375 -74 31 -142 56 -151 56 -9 0 -66 -21 -126 -46 -478 -202 -972 -339 -1385 -384 -57 -6 -110 -16 -117 -22 -10 -9 -12 -189 -9 -957 3 -929 4 -948 25 -1039 26 -112 71 -248 111 -336 l30 -66 -89 0 -89 0 -29 78 c-40 103 -68 195 -94 311 -22 95 -22 108 -25 1132 l-4 1036 158 12 c448 34 1039 195 1529 415 54 25 104 45 111 45 7 1 63 -21 125 -48z m277 -216 l0 -294 -99 -12 c-538 -65 -967 -459 -1076 -986 -80 -387 38 -797 315 -1098 l62 -67 -272 0 -271 0 -39 83 c-48 104 -92 236 -116 352 -18 84 -19 148 -19 995 l0 905 30 3 c374 34 905 176 1350 360 66 28 123 50 128 51 4 1 7 -131 7 -292z m255 225 c414 -165 811 -275 1160 -323 88 -12 166 -23 173 -25 10 -3 12 -176 9 -916 -3 -890 -4 -915 -24 -1003 -29 -120 -67 -232 -113 -333 l-39 -82 -271 0 -272 0 62 68 c233 252 355 582 337 911 -33 613 -487 1097 -1100 1172 l-97 12 0 295 c0 231 3 293 13 289 6 -3 80 -32 162 -65z m-45 -616 c161 -25 162 -16 -14 -144 l-155 -112 -156 112 c-176 127 -175 119 -25 143 114 18 235 18 350 1z m-390 -195 l175 -128 0 -143 0 -143 -225 -164 c-124 -89 -229 -163 -233 -163 -5 0 -66 18 -136 40 l-127 41 -67 202 c-37 111 -67 212 -67 223 0 28 169 191 259 249 80 52 208 115 231 114 8 0 94 -58 190 -128z m718 94 c40 -19 105 -55 143 -80 90 -58 259 -221 259 -249 0 -11 -30 -112 -67 -224 l-68 -203 -128 -40 c-71 -22 -134 -38 -141 -36 -7 3 -113 78 -234 167 l-222 161 0 139 0 139 178 130 c97 72 184 130 192 131 9 0 48 -16 88 -35z m-1349 -762 c1 -14 -303 -236 -307 -224 -1 4 4 53 12 107 24 158 70 289 154 434 l27 44 57 -174 c31 -96 57 -180 57 -187z m1885 238 c24 -47 56 -124 71 -171 24 -79 60 -271 53 -291 -3 -8 -269 179 -302 211 -5 5 17 88 50 190 66 206 56 201 128 61z m-806 -215 l219 -160 -42 -130 c-23 -72 -61 -191 -85 -263 l-44 -133 -276 0 -276 0 -86 263 -86 262 96 70 c53 39 153 111 222 162 69 50 128 91 132 90 3 -1 105 -74 226 -161z m655 195 c-112 -104 -444 -358 -545 -417 l-30 -18 0 240 0 241 313 0 312 -1 -50 -45z m-3545 -367 l0 -140 -32 23 c-65 45 -353 251 -357 254 -2 2 84 4 192 4 l197 0 0 -141z m643 43 c128 -113 262 -220 392 -313 135 -98 273 -189 285 -189 13 0 193 120 320 213 123 91 284 222 386 314 l81 73 114 0 114 -1 -102 -98 c-225 -217 -580 -491 -850 -656 l-63 -38 -62 38 c-272 166 -624 437 -852 657 l-101 97 113 1 113 0 112 -98z m637 -143 l0 -240 -30 18 c-100 59 -422 305 -545 417 l-50 45 313 1 312 0 0 -241z m655 195 c-4 -3 -292 -209 -356 -254 l-33 -23 0 140 0 141 197 0 c108 0 194 -2 192 -4z"/></g></svg>
                </x-nav-icon>
                {{ __('Teams') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('matches', ['matche' => Carbon::now()->format('Y-m-d')])" :active="request()->routeIs('matches')">
                <x-nav-icon>
                    <i class="fas fa-regular fa-clock"></i>
                </x-nav-icon>
                {{ __('Matches') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin_dashboard')" :active="request()->routeIs('admin_dashboard')">
                <x-nav-icon>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg>
                </x-nav-icon>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
