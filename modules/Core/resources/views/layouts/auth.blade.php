<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Achieve.io - @yield('title')
    </title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
    @livewireStyles
</head>

<body
    x-data="{ loaded': true, 'darkMode': false, }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}">
    <!-- ===== Preloader Start ===== -->
    {{-- <include src="./partials/preloader.html"></include> --}}
    <!-- ===== Preloader End ===== -->

    @yield('content')

    @livewireScripts
</body>

</html>