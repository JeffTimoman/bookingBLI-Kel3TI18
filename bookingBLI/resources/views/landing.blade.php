@extends('layout/room')
@section('content')

        <div class="bg-indigo-200 flex justify-around items-center text-center py-20">
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">FAVORITES</h3>
                <a href="favorites.html" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./landing/BLI_aerialview 1.png" alt="Favorites" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">See all your favorite rooms for easier booking access</p>
            </div>
    
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">BOOK</h3>
                <a href="/room" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./landing/BLI_aerialview 1.png" alst="Book" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">Browse all of today’s available rooms for booking</p>
            </div>
    
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">HISTORY</h3>
                <a href="history.html" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./landing/BLI_aerialview 1.png" alt="History" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">Take a look at all of your bookings, including ongoing ones</p>
            </div>
        </div>
    </div>
@endsection

