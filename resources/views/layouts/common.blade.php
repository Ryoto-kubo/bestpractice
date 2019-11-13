<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common/head')
</head>
<body>
    @include('common/header')
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    @include('common/footer')
</body>
</html>
