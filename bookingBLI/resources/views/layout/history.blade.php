<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Albert Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('component/navbar')
    @yield('content')
    @include('component/footer')
</body>
</html>