<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'App Coarpe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

</head>

<body>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layout.partials.header')
    <main>
        @yield('content')
    </main>
    @include('layout.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

=======
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'App Coarpe')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>

    @include('layout.partials.header')

    <div class="d-flex w-100">

        @include('layout.partials.nav')

        <main class="main-content-wrapper p-3 p-md-4 w-100">
            @yield('content')
        </main>

    </div>

    @include('layout.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
>>>>>>> 214eab061ee6992d0e2771313c8bf0c62722a3cf
</html>
