@extends('layout/room')


@section('title', 'Favorite')

@section('content')
<!-- Favorite Rooms Header Section -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 lg:px-12 mt-40 ">
        <div class="flex items-center mb-6 justify-start">
            {{-- a href to last page --}}

            <a href="{{ url()->previous() }}" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
           <h2 class="text-3xl font-semibold text-gray-800">FAVORITE ROOMS</h2>
        </div>
    </div>

  <!-- Main Content: Favorite Rooms -->
    <div class="max-w-7xl mx-auto px-6 md:px-8 lg:px-12 pb-6 md:pb-8 lg:pb-12 main-content flex-1 min-h-screen">
      <div class="flex flex-col">

            <!-- Favorite Rooms Card Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8 mt-8" id="favorite-rooms-container">
            <!-- Room Card -->
            @foreach(auth()->user()->favorites as $room)
            <a class="contents" href="{{ url('/room/'.$room->name) }}">
                <div class="w-[360px] h-[360px] rounded-xl relative bg-[#f8f8f8] shadow-[0_0_0_1px_#e0e0e0]" conType="card" data-room-id="{{ $room->id }}">
                    <div class="flex justify-center mt-6">
                        <img src="{{ asset('rooms/' . $room->img) }}" alt="Room A8002" class="w-[294px] h-[234px] object-cover rounded-md">
                    </div>
                    <div class="text-center mt-4 px-4">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $room->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $room->roomType->name }}, Floor {{ substr($room->name, 0, 2) }}, Tower A</p>
                    </div>
                    <button 
                        class="absolute top-4 right-4 p-2 focus:outline-none favorite-button"
                        data-room-id="{{ $room->id }}"
                        onclick="event.preventDefault(); event.stopPropagation();"
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
                </div>
            </a>
            @endforeach
            </div>
            <div id="empty-message" class="text-center mt-8 hidden">
                <p class="text-gray-600 text-lg">You don't have any favorite room yet</p>
            </div>
        </div>
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

            checkEmpty();
            
            document.querySelectorAll('.favorite-button').forEach(button => {
                button.addEventListener('click', async function() {
                    const roomId = this.dataset.roomId;
                    const card = this.closest('[conType]');
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
                            document.querySelectorAll(`[data-room-id="${roomId}"] .heart-icon path`).forEach(icon => {
                                icon.setAttribute('fill', 'gray');
                            });
                            card.remove();
                            checkEmpty();
                        } else {
                            console.error('Error removing favorite');
                        }
                    } catch (error) {
                        console.error('Network error:', error);
                        checkEmpty();
                    }
                });
            });
        });
    </script>
@endsection