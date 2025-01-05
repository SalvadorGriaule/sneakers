<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/base.js'])
</head>

<body>
    <header>
        <div id="trueH">
            <div id="leftCorn">
                <div id="burger" class="flex items-center justify-center"><img
                        src={{ asset('storage/img/menu-svgrepo-com.svg') }}></div>
                <h1 class="text-[2rem]"><a href="/">sneakers</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="/new">Collections</a></li>
                    <li><a href="/category/1">Men</a></li>
                    <li><a href="">Women</a></li>
                    @auth
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/logout">Déconnexion</a></li>
                    @endauth
                    @auth('admin')
                        <li><a href="/admin/dashbord">Dashboard</a></li>
                        <li><a href="/admin/logout">Déconnexion</a></li>
                    @endauth
                    @guest
                        <li><a href="/login">Connexion</a></li>
                    @endguest
                </ul>
            </nav>
            <div id="rightCorn">
                <div><i class="fa-solid fa-cart-shopping"></i></div>
                @guest
                    <div><img src="{{ asset('storage/img/user.svg') }}" alt=""></div>
                @endguest
                @auth
                    @session('avatar')
                        @if ($value != "NULL")
                            <div class="rounded-full overflow-hidden w-10 h-10 flex justify-center items-center bg-cover bg-center"
                                style="background-image: url({{ asset('storage/' . $value) }})"></div>
                        @else
                            <div><img src="{{ asset('storage/img/user.svg') }}" alt=""></div>
                        @endif
                    @endsession
                @endauth
            </div>
        </div>
        <div id="frontimg">
            <h2>Code is Law</h2>
        </div>
        <p>Men \ Winter collection</p>
    </header>
