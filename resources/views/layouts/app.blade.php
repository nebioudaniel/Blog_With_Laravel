<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Blog')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="bg-blue-800 text-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-extrabold">My Blog</a>
            <nav class="space-x-6">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('about') }}" class="hover:underline">About</a>
                @auth
                    <a href="{{ route('posts.index') }}" class="hover:underline">Posts</a>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="hover:underline">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="hover:underline">Register</a>
                @endguest
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
