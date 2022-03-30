<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?20220321') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-100">
        @if (auth('admin')->user())
        @include('layouts.admin-navigation')
        @elseif(auth('users')->user())
        @include('layouts.user-navigation')
        @endif

        @if (session('flash'))
        <p class="bg-green-100 rounded-lg py-5 px-6 text-base text-green-700 mb-3 text-center" role="alert">
            {{ session('flash') }}
        </p>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
