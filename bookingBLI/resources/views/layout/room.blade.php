<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tab')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Albert Sans', sans-serif;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    @hasSection('content')
        @include('component/navbar', ['navbarStyle' => 'other'])
        @yield('content')
        @include('component/footer')
    @else
        @yield('content-land')
        @include('component/footer')
    @endif
</body>
</html>