<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
    <div id="app">
        {{--  Enviar mensaje cuando envia correctamente la vacante  --}}
        @if (session('estadoCV'))
            <div class="text-center font-bold bg-teal-500 py-8 text-gray-100 uppercase">
                {{ session('estadoCV') }}
            </div>
        @endif
        <nav class="bg-gray-800 py-3">
            <div class="container mx-auto md:px-0">
                <div class="flex items-center justify-around">
                    <a class="text-white text-2xl" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <nav class="flex-1 text-right" >
                        <!-- Authentication Links -->
                        @guest
                                @if (Route::has('login'))
                                    <a class="text-white p-3 no-underline hover:text-gray-400 hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                                
                                @if (Route::has('register'))
                                    <a class="text-white p-3 no-underline hover:text-gray-400 hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                
                                <span class="text-gray-300 text-sm pr-2">
                                    {{ Auth::user()->name }}
                                </span>
                                <a 
                                    href="{{ route('notificaciones') }}"
                                    class="p-1 bg-teal-500 rounded-full text-sm text-white"
                                >
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </a>

                                <a class="hover:no-underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endguest
                    </nav>
                </div>
            </div>
        </nav>

        <div class="bg-gray-700 ">
            <nav class="container mx-auto flex space-x-1">
                @yield('navegacion')
            </nav>
        </div>

        <main class="py-4 mx-auto container mt-10">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
