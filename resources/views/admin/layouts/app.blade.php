<!doctype html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="https://feeldreams.github.io/main-icon.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />

    {{--
    <link href="{{ asset('/css/daisyUI.css') }}" rel="stylesheet" type="text/css" />--}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

</head>
<style>

</style>

<body>
    <div id="app">

        <div class="content">
            <div id="sidebar" class="container" style="width:170px">
                <div class="row">
                    <div class="col-3">

                        <div class="navigation shadow active">
                            <div class="head">
                                <a href="{{ url('/') }}" class="flex items-center">
                                    <img class="rotate-on-load" src="https://feeldreams.github.io/main-icon.png" alt=""
                                        width="24" height="24" class="d-inline-block align-text-top">
                                    <span class="slide-on-load ml-3 text-lg font-semibold">{{ config('app.name',
                                        'Rayys') }}</span>
                                </a>
                            </div>
                            <ul>
                                <li class="list @if(request()->is('admin')) active @endif">
                                    <b></b>
                                    <b></b>
                                    <a href="{{ url('/') }}" data-text="Home">
                                        <svg class='line stroke-black' xmlns='http://www.w3.org/2000/svg'
                                            viewBox='0 0 24 24'>
                                            <g transform='translate(2.400000, 2.000000)'>
                                                <line x1='6.6787' y1='14.1354' x2='12.4937' y2='14.1354'></line>
                                                <path
                                                    d='M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z'>
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="title">{{ __('Beranda') }}</span>
                                    </a>
                                </li>
                                <li
                                    class="list @if(request()->is('admin/template*') || request()->is('hasilpesan*')) active @endif">
                                    <b></b>
                                    <b></b>
                                    <a href="{{ route('template.index') }}" data-text="Template">
                                        <svg class='line stroke-black'xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g><rect x='5.54615' y='5.54615' width='16.45385' height='16.45385' rx='4'></rect><path d='M171.33311,181.3216v-8.45385a4,4,0,0,1,4-4H183.787' transform='translate(-169.33311 -166.86775)'></path></g></svg>
                                        <span class="title">{{ __('Template') }}</span>
                                    </a>
                                </li>
                                <li class="hidden list @if(request()->is('bagikan*')) active @endif">
                                    <b></b>
                                    <b></b>
                                    <a href="{{ route('profil') }}" data-text="Profil">
                                        <svg class='line stroke-black' xmlns='http://www.w3.org/2000/svg'
                                            viewBox='0 0 24 24'>
                                            <g transform='translate(2.800000, 2.800000)'>
                                                <path
                                                    d='M8.69324995,9.63816777 C8.69324995,9.63816777 -3.28340005,7.16056777 0.878549946,4.75801777 C4.39069995,2.73071777 16.4946499,-0.75483223 18.1856499,0.14576777 C19.0862499,1.83676777 15.6006999,13.9407178 13.5733999,17.4528678 C11.1708499,21.6148178 8.69324995,9.63816777 8.69324995,9.63816777 Z'>
                                                </path>
                                                <line x1='8.69325' y1='9.638168' x2='18.18565' y2='0.145768'></line>
                                            </g>
                                        </svg>
                                        <span class="title">{{ __('Bagikan') }}</span>
                                    </a>
                                </li>
                                <li class="list @if(request()->is('profil*')) active @endif">
                                    <b></b>
                                    <b></b>
                                    <a href="{{ route('profil') }}" data-text="Profil">
                                        <svg class='line stroke-black' xmlns='http://www.w3.org/2000/svg'
                                            viewBox='0 0 24 24'>
                                            <g>
                                                <path
                                                    d='M98.80039,256.86631c-.97137-1.16611-2.19075-2.16707-3.51485-2.16707s-2.54349,1.001-3.51485,2.16707a4.53642,4.53642,0,0,0,.3,6.103h.00006a4.54643,4.54643,0,0,0,6.42959,0h.00006A4.53642,4.53642,0,0,0,98.80039,256.86631Z'
                                                    transform='translate(-83.28549 -252.69924)'></path>
                                                <rect x='2' y='15.30177' width='20' height='6.69823' rx='3.34911'>
                                                </rect>
                                            </g>
                                        </svg>
                                        <span class="title">{{ __('Profil') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="inikonten">

                @auth
                <nav class="flex items-center justify-between px-5 md:px-7 py-2 bg-white shadow-sm">
                    <span class="text-lg font-semibold">@yield('judul')</span>
                    <ul class="flex items-center space-x-4">
                        @guest
                        @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a></li>
                        @endif

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                        </li>
                        @endif

                        @else

                        {{--
                        @if (Route::has('formulir'))
                        <li><a href="{{ route('formulir') }}" class="text-gray-700 hover:text-gray-900">Formulir</a>
                        </li>
                        @endif

                        @if (Route::has('mahasiswa'))
                        <li><a href="{{ route('mahasiswa') }}" class="text-gray-700 hover:text-gray-900">Mahasiswa</a>
                        </li>
                        @endif
                        --}}

                        @auth

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>

                        {{--
                        <div class="relative inline-block text-left">
                            <input type="checkbox" id="menu-button" class="hidden">
                            <label id="label-menulogout" for="menu-button"
                                class="relative inline-block text-left py-2 text-gray-700 hover:text-gray-900 focus:outline-none focus:text-gray-900 flex items-center">
                                {{ Auth::user()->name }}
                            </label>

                            <div id="menulogout"
                                class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                role="menu" aria-orientation="vertical" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Logout</a>
                                </div>
                            </div>
                        </div>
                        --}}

                        <div class="dropdown">
                            <input type="checkbox" id="dropdown-toggle" />
                            <label for="dropdown-toggle">
                                <p>{{ Auth::user()->name }}</p>
                                <svg class='line stroke-white' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                    <g transform='translate(5.000000, 8.500000)'>
                                        <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                                    </g>
                                </svg>
                            </label>
                            <div class="menu shadow z-10">
                                <a href="{{ route('profil') }}">
                                    <span><svg class='line stroke-white' xmlns='http://www.w3.org/2000/svg'
                                            viewBox='0 0 24 24'>
                                            <g transform='translate(5.000000, 2.400000)'>
                                                <path
                                                    d='M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z'>
                                                </path>
                                                <path
                                                    d='M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z'>
                                                </path>
                                            </g>
                                        </svg></span>
                                    <p>{{ __('Profil') }}</p>
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span><svg class='line stroke-white' xmlns='http://www.w3.org/2000/svg'
                                            viewBox='0 0 24 24'>
                                            <g transform='translate(2.000000, 2.000000)'>
                                                <line x1='19.791' y1='10.1207' x2='7.75' y2='10.1207'></line>
                                                <polyline points='16.8643 7.2047 19.7923 10.1207 16.8643 13.0367'>
                                                </polyline>
                                                <path
                                                    d='M0.2588,5.6299 C0.5888,2.0499 1.9288,0.7499 7.2588,0.7499 C14.3598,0.7499 14.3598,3.0599 14.3598,9.9999 C14.3598,16.9399 14.3598,19.2499 7.2588,19.2499 C1.9288,19.2499 0.5888,17.9499 0.2588,14.3699'
                                                    transform='translate(7.309300, 9.999900) scale(-1, 1) translate(-7.309300, -9.999900) '>
                                                </path>
                                            </g>
                                        </svg></span>
                                    <p>{{ __('Logout') }}</p>
                                </a>
                            </div>
                        </div>
                        @endauth
                        @endguest
                    </ul>
                </nav>
                @endauth

                @yield('content')

            </div>
        </div>
    </div>

    <script>
        /*
        const menuButton = document.getElementById("menu-button");
        const menu = document.getElementById("menu");

        menuButton.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            if (menu.classList.contains("hidden")) return;
            if (!menu.contains(event.target) && event.target !== menuButton) {
                menu.classList.add("hidden");
            }
        });
        */
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

</body>

</html>