<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Footure</title>
        <script src="https://kit.fontawesome.com/20ee220576.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            body{
                background-image: url('/images/5.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" >
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            <div class="mt-4">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div {!! $attributes->merge(['class' => 'w-full sm:max-w-md mt-6 mb-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg']) !!}>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
