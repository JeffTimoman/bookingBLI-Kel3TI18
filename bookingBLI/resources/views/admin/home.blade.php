@extends('layout/adminTemplate')
@section('content')
<div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-0">
    <h1 class="text-2xl font-semibold text-gray-700">Dashboard</h1>
  </div>

<!-- Pending Requests Section -->
<section class="mb-8">
  <div class="bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">Pending Requests</h2>
    <div class="flex flex-wrap gap-12">
    
    @foreach($data as $item)
      @if($item['status'] == 0 && $item['date'] == now()->toDateString())
    <!-- Requests Card 1 -->
      <div class="relative bg-gray-50 rounded-lg shadow-md p-4 w-64 transition-all duration-300 hover:w-96 hover:shadow-lg group group-hover:opacity-100">
        <div class="flex items-center justify-between mb-3">
          <h3 class="font-semibold text-lg text-gray-700">{{ $item['room_name'] }}</h3>
          <p class="text-xs text-gray-500">{{ $item['created_at']->format('h:i A') }}</p>
        </div>
    
        <div class="flex items-start justify-between w-auto">
          <!-- Kiri -->
          <div class="text-[15px]">
            @foreach($item['time_id'] as $index => $time)
            <p class="text-gray-600 mb-1 w-40">{{ $time }}</p>
            @endforeach
            <h3 class="text-gray-600 mt-2 mb-1">{{ $item['user_name'] }}</h3>
            <p class="text-gray-600">{{ $item['user_type'] }}</p>
          </div>
      
          <!-- Kanan (Muncul saat card di-hover) -->
          <div class="w-1/2 pl-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <h3 class="text-sm text-gray-600 font-semibold">Purpose:</h3>
            <p class="text-sm text-gray-600">{{ $item['purpose'] }}</p>
          </div>
        </div>
      
        <div class="flex items-center mt-2">
          <img src="{{ asset('./assets/icon1.png') }}" alt="people" class="h-5">
          <span class="text-xs text-gray-500 ml-3">{{ $item['people'] }} People</span>
        </div>
      
        <div class="flex justify-end mt-4">
          <form action="{{ route('admin.home.change') }}" method="POST">
            @csrf
            @foreach ($item['book_id'] as $bookId)
              <input type="hidden" name="book_id[]" value="{{ $bookId }}">
            @endforeach
            <input type="hidden" name="status" value="-1">
            <button class="bg-red-500 hover:bg-red-700 text-white rounded-full p-1 mr-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </form>
          <form action="{{ route('admin.home.change') }}" method="POST">
            @csrf
            @foreach ($item['book_id'] as $bookId)
              <input type="hidden" name="book_id[]" value="{{ $bookId }}">
            @endforeach
            <input type="hidden" name="status" value="1">
            <button class="bg-green-500 hover:bg-green-700 text-white rounded-full p-1">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </button>
          </form>
        </div>
      </div>
      @endif
      @endforeach

      <!-- Request Card 2 -->

      <!-- Request Card 3 -->
     
    </div>
    <div class="flex justify-end r-0 ml-3 mt-3 mr-2">
      <a href="{{ route('admin.pending.index') }}" class="text-[18px] text-blue-500 hover:text-blue-700 font-semibold transition-opacity duration-300 opacity-100">
        See more →
      </a>
    </div>
    
    
  </div>
</section>

@php
    $today = now()->toDateString(); // Get today's date (YYYY-MM-DD)
    $activeBookingsCount = collect($data)->filter(function ($data) use ($today) {
        return $data['date'] === $today && $data['status'] == 1;
    })->count();
@endphp

<div class="grid grid-cols-3 gap-6 p-6 h-84">
  <div class="bg-white p-6 rounded-2xl shadow-lg text-center flex flex-col">
    <h2 class="text-[1.5rem] font-semibold text-gray-600">Active bookings</h2>
    <hr class="border-t-2 border-gray-300 my-2">
    <p class="text-[8rem] font-bold text-blue-700 my-3">{{ $activeBookingsCount }}</p>
    <div class="mt-auto"> 
      <a href="{{ route('admin.active.index') }}" class="text-blue-600 hover:underline text-[1.2rem]">See details →</a>
    </div>
  </div>

  <div class="bg-white p-6 rounded-2xl shadow-lg flex flex-col"> 
    <h2 class="text-[1.5rem] font-semibold text-gray-600 text-center">Rooms</h2>
    <hr class="border-t-2 border-gray-300 my-2 w-full">
    <div class="flex items-center justify-center h-full">
    @foreach($rooms->take(2) as $room)
    <div class="w-auto h-auto bg-blue-50 rounded-lg shadow-lg flex flex-col items-center relative">
      <img src="{{ asset('./assets/room1.jpg') }}" alt="Room 1" class="w-[80%] h-[70%] object-cover rounded mt-4">
      @if($room->status == 1)
        <div id="overlay-1" class="hidden absolute inset-0 text-center bg-gray-500 bg-opacity-50 flex items-center justify-center text-white font-semibold rounded">
          NOT AVAILABLE
        </div>
      @else
        <div id="overlay-1" class="absolute inset-0 text-center bg-gray-500 bg-opacity-50 flex items-center justify-center text-white font-semibold rounded">
          NOT AVAILABLE
        </div>
      @endif
      <p class="mt-2 mb-2 text-gray-400 text-lg font-semibold">{{ $room->name }}</p>
    </div>
    @endforeach
  </div>
    <div class="mt-auto"> 
      <a href="{{ route('admin.room.index') }}" class="text-blue-600 hover:underline block text-center text-[1.2rem]">See all rooms →</a>
    </div>
  </div>

  <div class="bg-white p-6 rounded-2xl shadow-lg flex flex-col"> 
    <h2 class="text-[1.5rem] font-semibold text-gray-600 text-center">History</h2>
    <hr class="border-t-2 border-gray-300 my-2">
    <div>
    @foreach($data as $item)
      @if($item['status'] != 0)
      <div class="flex items-start mb-2 bg-gray-100 p-2">
        <div>
          <p class="text-base font-medium text-gray-800">{{{ $item['room_name'] }}} • {{ $item['people'] }} People</p>
          <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item['date'])->format('l, jS F Y') }}</p>
        </div>
      </div>
      @endif
    @endforeach
    </div>
    <div class="mt-auto"> 
      <a href="#" class="text-blue-600 hover:underline block text-center text-[1.2rem]">See all →</a>
    </div>
  </div>
</div>
@endsection