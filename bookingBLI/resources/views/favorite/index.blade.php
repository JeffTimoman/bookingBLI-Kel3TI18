<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - BCA Learning Institute</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Albert Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

  <!-- Navbar -->
    <nav class="bg-[#174AA9] text-[#FFF] py-4 px-6 flex items-center justify-between shadow-md rounded-b-[22px] relative z-10">
        <div class="flex items-center gap-8">
        <img src="./assets/LOGO BLI.png" alt="Logo" class="h-16 w-auto ml-4">
        <img src="./assets/bca learning.png" alt="BCA Learning" class="h-14 w-auto">
        </div>
        <div class="flex gap-14 text-[18px] font-semibold tracking-[1.08px] ml-auto hidden lg:flex">
        <a href="#" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">FAVORITES</a>
        <a href="#" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">BOOK</a>
        <a href="#" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">HISTORY</a>
        </div>
        <div class="flex items-center gap-10 ml-14 hidden lg:flex">
        <img src="./assets/icon.png" alt="Bell" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
        <img src="./assets/base.png" alt="Logout" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
        </div>
    </nav>

    <!-- Favorite Rooms Header Section -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 lg:px-12 mt-8">
        <div class="flex items-center mb-6 justify-start">
            <a href="#" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
           <h2 class="text-3xl font-semibold text-gray-800">FAVORITE ROOMS</h2>
        </div>
    </div>

  <!-- Main Content: Favorite Rooms -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 lg:px-12 main-content flex-1">
      <div class="flex flex-col">

            <!-- Favorite Rooms Card Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8" id="favorite-rooms-container">
            <!-- Room Card -->
            @foreach(auth()->user()->favorites as $room)
                <div class="w-[360px] h-[360px] rounded-xl relative bg-[#f8f8f8] shadow-[0_0_0_1px_#e0e0e0]" data-room-id="{{ $room->id }}">
                    <div class="flex justify-center mt-6">
                        <img src="./assets/pic.png" alt="Room A8002" class="w-[294px] h-[234px] object-cover rounded-md">
                    </div>
                    <button 
                        class="absolute top-4 right-4 p-2 focus:outline-none favorite-button"
                        data-room-id="{{ $room->id }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 heart-icon">
                            <path 
                                fill="red" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M12 21l-1-1c-5.5-5.5-9-9-9-12a5 5 0 0110-4 5 5 0 0110 4c0 3-3.5 6.5-9 12l-1 1z"
                            ></path>
                        </svg>
                    </button>
                    <div class="text-center mt-4 px-4">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $room->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $room->roomType->name }}, Floor 8, Tower A</p>
                    </div>
                </div>
            @endforeach
            </div>
            <div id="empty-message" class="text-center mt-8 hidden">
                <p class="text-gray-600 text-lg">You don't have any favorite room yet</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-gradient-to-b from-[#004AAD] to-[#00092D] text-white mt-10">
        <footer class="w-full py-10 px-6 md:px-12 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-start gap-2">
                <img src="footer/logos.svg" alt="BCA Logo" class="h-40">
                </div>
                <div>
                    <h3 class="text-sm font-normal mb-3">Lokasi</h3>
                    <p class="text-sm leading-8 font-normal tracking-wider">
                    Sentul City<br>
                    Jl. Pakuan No. 3, Sumur Batu, Babakan Madang, <br>
                    Bogor 16810
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-normal mb-3">Hubungi Kami</h3>
                    <ul class="text-sm leading-10">
                        <li class="flex items-center gap-2">
                        <img src="footer/6.png" alt="Phone" class="h-5">
                        <span>Halo BCA 1500888</span>
                        </li>
                        <li class="flex items-center gap-2">
                        <img src="footer/7.png" alt="Email" class="h-5">
                        <span>halobca@bca.co.id</span>
                        </li>
                        <li class="flex items-center gap-2">
                        <img src="footer/5.png" alt="Phone 2" class="h-5">
                        <span>62-922-0355-800</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-normal mb-2">Media Sosial</h3>
                    <ul class="flex flex-col space-y-3 text-sm">
                        <li class="flex items-center gap-2 hover:text-gray-300 transition-colors duration-200">
                            <img src="footer/2.png" alt="Facebook" class="h-5">
                            <span>GoodLife BCA</span>
                        </li>
                        <li class="flex items-center gap-2 hover:text-gray-300 transition-colors duration-200">
                            <img src="footer/3.png" alt="Twitter" class="h-5">
                            <span>@goodlifebca</span>
                        </li>
                        <li class="flex items-center gap-2 hover:text-gray-300 transition-colors duration-200">
                            <img src="footer/1.png" alt="Instagram" class="h-5">
                            <span>Solusi BCA</span>
                        </li>
                        <li class="flex items-center gap-2 hover:text-gray-300 transition-colors duration-200">
                            <img src="footer/4.png" alt="YouTube" class="h-5">
                            <span>@BankBCA</span>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('favorite-rooms-container');
            const emptyMessage = document.getElementById('empty-message');

            function checkEmpty() {
            if (container.children.length === 0) {
                emptyMessage.classList.remove('hidden');
            } else {
                emptyMessage.classList.add('hidden');
            }
            }

            checkEmpty(); // Panggil saat pertama kali halaman dimuat
            // container.addEventListener('click', function(event) {
            // if (event.target.closest('.favorite-button')) {
            //     const button = event.target.closest('.favorite-button');
            //     const card = button.closest('[data-room-id]');

            //     if (card) {
            //     card.remove();
            //     checkEmpty(); // Periksa setelah card dihapus
            //     }
            // }
            // });
            document.querySelectorAll('.favorite-button').forEach(button => {
                button.addEventListener('click', async function() {
                    const roomId = this.dataset.roomId;
                    const card = this.closest('[data-room-id]');
                    const heartIcon = this.querySelector('.heart-icon path');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    try {
                        const response = await fetch(`/rooms/${roomId}/favorite`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                        });

                        if (response.ok) {
                            // Remove the card from the DOM
                            card.remove();
                            
                            // If you want to update the room page's heart immediately:
                            // Find all heart icons for this room on the page and update them
                            document.querySelectorAll(`[data-room-id="${roomId}"] .heart-icon path`).forEach(icon => {
                                icon.setAttribute('fill', 'gray');
                            });
                        } else {
                            console.error('Error removing favorite');
                        }
                    } catch (error) {
                        console.error('Network error:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>