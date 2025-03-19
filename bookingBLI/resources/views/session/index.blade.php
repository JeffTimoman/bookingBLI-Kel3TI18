{{-- @extends ('layout/app')

@section('content')
    <div class='w-50 center border rounded px-3 py-3 mx-auto'>
        <h1>Login</h1>
        <form action="/session/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection --}}
@extends('layout/login')

@section('content')
        <a href="#" class="mb-0">
            <img src="./login/logo.png" alt="Logo" class="w-36">
        </a>
        <div class="text-center text-white mb-7">
            <h1 class="text-6xl" style="font-family: 'AlbertSansBlack'">Welcome!</h1>
            <p class="text-lg mt-1" style="font-family: 'AlbertSansRegular'">Please login using your employee ID and birthday</p>
        </div>
        <form action="./session/login" method="POST" class="flex flex-col items-center w-full max-w-md" style="font-family: 'AlbertSansBlack'">
            @csrf
            <!-- Username Input -->
            <div class="relative w-full mb-4">
                <img src="./login/2.png" alt="User Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-10 h-10">
                <input 
                    type="text" 
                    placeholder="Enter your username" 
                    class="w-full p-3 pl-16 bg-transparent border-[3px] border-white rounded-lg text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="username" id="username">
            </div>
            <!-- Password Input -->
            <div class="relative w-full mb-4">
                <img src="./login/1.png" alt="Password Icon" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-10 h-10">
                <input 
                    type="password" 
                    placeholder="Enter your password" 
                    class="w-full p-3 pl-16 bg-transparent border-[3px] border-white rounded-lg text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="password" id="password">
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-40 p-3 bg-transparent border-[3px] border-white text-white rounded-lg font-medium hover:bg-blue-500 hover:text-white  hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700">
                LOG IN
            </button>
        </form>
@endsection
