@extends('layout/room')

@section('title', 'Home')

@section('content-land')
    <div class="relative bg-cover bg-center w-full" style="background-image: url('./landing/bg1.png');">
        <div class="text-center text-white py-12 text-4xl font-light">TOP ROOMS OF THIS WEEK</div>
        <div class="flex justify-between items-center gap-0 p-0">
            @foreach($topRooms as $room)
                <a class="contents" href="{{ url('/room/'.$room->name) }}">
                    <div class="text-center flex-1 relative group">
                        <img src="{{ asset('rooms/' . $room->img) }}" alt="Rooms" class="w-full aspect-[6/11] object-cover transition-all duration-300 ease-in-out group-hover:filter blur-hover group-hover:translate-y-[-30px]">
                        <div class="absolute bottom-[-20%] left-1/2 transform -translate-x-1/2 text-white text-[10rem] font-black drop-shadow-[0_5px_6px_rgba(0,0,0,0.6)] group-hover:bottom-[-32%] transition-all duration-500 z-20">
                            {{ $loop->iteration }}
                        </div>
                        <div class="absolute top-0 left-0 w-full text-white px-4 py-2 group-hover:translate-y-[-30px] transition-all duration-300 ease-in-out pointer-events-none text-left font-medium z-10">
                            {{ $room->name }}
                            <br>
                            {{ $room->roomType->name }}
                        </div> 
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-transparent text-white px-4 py-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-[-30px] transition-all duration-300 ease-in-out pointer-events-none text-left font-medium z-10">
                            {{ $room->description }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="h-36 w-full"></div>

        @include('component/navbar', ['navbarStyle' => 'home'])

        <div class="bg-indigo-200 flex justify-around items-center py-8 text-center">
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">FAVORITES</h3>
                <a href="/favorite" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./assets/pic.png" alt="Favorites" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">See all your favorite rooms for easier booking access</p>
            </div>
    
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">BOOK</h3>
                <a href="/room" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./assets/pic3.jpg" alst="Book" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">Browse all of today’s available rooms for booking</p>
            </div>
    
            <div class="flex flex-col items-center">
                <h3 class="text-4xl mb-10 mt-12 font-medium">HISTORY</h3>
                <a href="/history" class="w-96 h-96 rounded-full overflow-hidden relative">
                    <img src="./assets/pic2.jpg" alt="History" class="w-full h-full object-cover">
                </a>
                <p class="mt-10 mb-12 text-lg px-8 w-2/3">Take a look at all of your bookings, including ongoing ones</p>
            </div>
        </div>
    </div>
@endsection

