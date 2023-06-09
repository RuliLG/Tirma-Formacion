<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
