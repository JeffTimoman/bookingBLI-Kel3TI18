@extends('layout/adminTemplate')
@section('content')
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Rooms</h2>

    <!-- Search Bar -->
    <div class="mb-4">
      <form method="GET" action="{{ route('admin.room.index') }}">
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" name="search" id="search" value="{{ request('search') }}"
                 class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                 placeholder="Search here">
        </div>
      </form>
    </div>

    <!-- Room Cards -->
    @foreach($rooms as $room)
    <div class="grid grid-cols-1 gap-4">

      <!-- Room A2001 -->
      <div class="bg-blue-100 rounded-lg shadow-md overflow-hidden">
        <div class="flex">
          <div class="w-1/3">
            <img src="{{ asset('rooms/' . $room->img) }}" alt="Room A2001" class="object-cover h-48 w-full">
          </div>
          <div class="w-2/3 p-4">
            <h3 class="text-xl font-semibold text-gray-800">Room {{ $room->name }}</h3>
            <p class="text-gray-600 text-sm mt-1">Floor {{ $room->floor }}, {{ $room->roomType->name }}</p>
            <p class="text-gray-500 text-sm mt-1">{{ $room->description }}</p>
            @if($room->status == 0)
            <div class="mt-4 flex justify-between items-center">
                <form action="{{ route('admin.room.change') }}" method="POST">
                  @csrf
                  <input type="hidden" name="room_id" value="{{ $room->id }}">
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Set as available
                  </button>
                </form>
              <span class="text-red-500 font-semibold text-sm">ROOM UNAVAILABLE</span>
            </div>
            @elseif($room->status == 1)
            <div class="mt-4">
                <form action="{{ route('admin.room.change') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                        Set as unavailable
                    </button>
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
@endforeach

@if ($rooms->hasPages())
<nav role="navigation" aria-label="Pagination" class="flex justify-center mt-4">
    {{-- Previous Page Link --}}
    @if ($rooms->onFirstPage())
        <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">« Previous</span>
    @else
        <a href="{{ $rooms->previousPageUrl() }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">« Previous</a>
    @endif

    {{-- Pagination Links --}}
    @foreach ($rooms->links()->elements[0] as $page => $url)
        @if ($page == $rooms->currentPage())
            <span class="px-3 py-1 mx-1 text-white bg-blue-500 rounded">{{ $page }}</span>
        @else
            <a href="{{ $url }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($rooms->hasMorePages())
        <a href="{{ $rooms->nextPageUrl() }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">Next »</a>
    @else
        <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Next »</span>
    @endif
</nav>
@endif

  </section>
@endsection