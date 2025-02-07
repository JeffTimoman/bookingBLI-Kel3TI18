<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page of BLI Booking website">
    <meta name="author" content="Kelompok 3">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'AlbertSansBlack';
            src: url('./login/Albert_Sans/static/AlbertSans-Black.ttf') format('truetype');
            font-weight: bold;
        }

        @font-face {
            font-family: 'AlbertSansRegular';
            src: url('./login/Albert_Sans/static/AlbertSans-Regular.ttf') format('truetype');
            font-weight: normal;
        }
    </style>
</head>
<body class="bg-cover bg-center h-screen" style="background-image: url('./login/bg_afterblur.svg');">
    <div class="flex flex-col justify-center items-center h-full">
        @yield('content')
        @include('component/loginpopup')
    </div>
</body>
</html>