<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Open Market</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    use App\Models\Category;
    $cat = Category::all();
@endphp

<body class=" antialiased bg-gray-100  ">
    <div class="min-h-screen ">
        <header class="flex justify-between items-center py-4 border-b border-black/10 px-5">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <form method="GET" action="/search" class="flex-1 max-w-xl mx-4">
                <input type="text" name="q"
                    class="rounded-sm border w-full border-white/20 hover:bg-gray-300/60 focus:bg-gray-300/80 focus:outline-none px-5 py-2 flex-1 bg-gray-200"
                    placeholder="Vestido...">
            </form>

            <nav>
                <ul class="flex space-x-5">
                    @guest
                        <li>
                            <a href="/register">Registro</a>
                        </li>
                        <li>
                            <a href="/login">Iniciar Sesión</a>
                        </li>
                    @endguest

                    @auth
                        <li class="font-bold">
                            {{ Auth::user()->name }}
                        </li>
                        <li>
                            <div class="space-x-6  flex">
                                <form method="POST" action="/logout">
                                    @csrf
                                    @method('DELETE')

                                    <button>Cerrar sesión</button>
                                </form>
                            </div>
                        </li>

                    @endauth
                </ul>
            </nav>
        </header>


        <main class="mt-10 max-w-[986px] mx-auto min-h-[65vh]">
            {{ $slot }}
        </main>

        <footer class="mt-12 text-white/80 bg-gray-900 px-8 pt-4">
            <div class="mb-6 flex justify-between ">
                <div>
                    <p class="font-bold text-2xl mb-6">Explora Categorias</p>
                    <ul class="grid grid-cols-3 gap-x-16 gap-y-2">
                        @for ($i = 0; $i < 14; $i++)
                            <li class="hover:bg-gray-600 px-3 py-1 rounded-lg">
                                <a href='http://localhost/search?category={{ $cat[$i]['id'] }}'>{{ $cat[$i]['name'] }}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div>
                    <p class="font-bold text-2xl mb-6 mr-20">Redes Sociales</p>
                    <ul class="flex gap-x-4">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                width="40"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                                <path
                                    d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"
                                    fill="white" />
                            </svg>
                        </li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                width="40"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"
                                    fill="white" />
                            </svg></li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                width="40"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"
                                    fill="white" />
                            </svg></li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center border-t border-white/25 pt-4 pb-2">
                <p class="text-sm">Realizado por Agustin Gil</p>

            </div>
        </footer>
    </div>
</body>

</html>
