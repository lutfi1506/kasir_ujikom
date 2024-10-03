<!doctype html>
<html lang="{{ config('app.locale') }}" class="scroll-smooth" data-theme="mytheme">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ config('app.name') }} </title>
    @vite('resources/css/app.css')
</head>

<body class="overflow-hidden h-screen bg-base-200">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <x-sidebar />
        <div class="flex flex-col flex-1">
            <x-header />
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container px-6 py-8 mx-auto font-[roboto]">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
