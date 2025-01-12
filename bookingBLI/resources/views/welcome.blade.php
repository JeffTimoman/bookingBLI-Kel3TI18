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
        <a href="#" class="mb-0">
            <img src="./login/logo.png" alt="Logo" class="w-36">
        </a>
        <div class="text-center text-white mb-7">
            <h1 class="text-6xl" style="font-family: 'AlbertSansBlack'">Welcome!</h1>
            <p class="text-lg mt-1" style="font-family: 'AlbertSansRegular'">Please login using your employee ID and birthday</p>
        </div>
        <form class="flex flex-col items-center w-full max-w-md" style="font-family: 'AlbertSansBlack'">
            <!-- Username Input -->
            <div class="relative w-full mb-4">
                <img src="./login/1.png" alt="User Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-10 h-10">
                <input 
                    type="text" 
                    placeholder="Enter your username" 
                    class="w-full p-3 pl-16 bg-transparent border-[3px] border-white rounded-lg text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Password Input -->
            <div class="relative w-full mb-4">
                <img src="./login/2.png" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-10 h-10">
                <input 
                    type="password" 
                    placeholder="Enter your password" 
                    class="w-full p-3 pl-16 bg-transparent border-[3px] border-white rounded-lg text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Forgot Password -->
            <div class="w-full text-right text-white text-sm mb-4" style="font-family: 'AlbertSansRegular'">
                <a href="#" class="underline hover:text-gray-300">I've forgotten my password</a>
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-40 p-3 bg-transparent border-[3px] border-white text-white rounded-lg font-medium hover:bg-blue-500 hover:text-white  hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700">
                LOG IN
            </button>
        </form>
    </div>
</body>
</html>

