<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    @yield('css')
</head>
<body class="h-100">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div id="app" class="content h-100">
        <b-navbar toggleable type="light" class="border-bottom">
            <b-container>
                <b-navbar-toggle target="menu"></b-navbar-toggle>
                <b-navbar-brand href="{{ url('/') }}">
                    <img src="{{ asset('img/logo32x32.png') }}" alt="Columbogram logo">
                    {{ config('app.name', 'Laravel') }}
                </b-navbar-brand>
                
                <b-collapse is-nav id="menu">
                    <b-navbar-nav class="ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <b-nav-item href="{{ route('login') }}">{{ __('Login') }}</b-nav-item>
                            <b-nav-item href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>
                        @else
                            <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                                <b-dropdown-item href="#" @click="logout">
                                    {{ __('Logout') }}
                                </b-dropdown-item>
                            </b-nav-item-dropdown>
                        @endguest
                    </b-navbar-nav>
                </b-collapse>
            </b-container>
        </b-navbar>

        <main style="height: calc(100% - 59.5px);">
            @yield('content')
        </main>
    </div>

    @yield('js')
</body>
</html>
