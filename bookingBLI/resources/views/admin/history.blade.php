@extends('layout.adminTemplate')
@section('content')
<div class="bg-gray-50">
    <div class="p-6 justify-center">
        <!-- Dashboard Section with Box -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 mt-0">
            <h1 class="text-2xl font-semibold text-gray-700">History</h1>
        </div>
    
      <!-- History Card Section (Centered) -->
      @foreach($data as $item)
        <div class="rounded-2xl shadow-lg flex flex-col md:flex-row gap-6 items-stretch bg-blue-100 w-full mt-6">
            <div class="relative w-full md:w-[400px] h-[400px] rounded-l-2xl">
                <img id="slider-image" src="{{ asset('rooms/' . $item['room_img']) }}" alt="Room Image" class="object-cover w-full h-full rounded-l-2xl">
                <div class="absolute top-1/2 transform -translate-y-1/2 w-full flex justify-between px-4">
                </div>
            </div>

            <div class="flex flex-col w-full md:w-2/3 p-6">
                <h2 class="text-[40px] font-medium text-gray-800">Room {{ $item['room_name'] }}</h2>
                <p class="text-[20px] font-medium text-gray-800 mb-3">{{ $item['user_name'] }}</p>
                <p class="text-gray-600 text-[20px]">{{ \Carbon\Carbon::parse($item['date'])->format('l, jS F Y') }}</p>
                <div class="flex items-center text-gray-700 text-[18px] mb-3">
                <img src="{{ asset('./assets/icon.svg') }}" alt="People" class="h-7 md:h-7 mr-2"> {{ $item['people'] }} People
                </div>
                <div class="mt-3 mb-3 grid grid-cols-3 gap-2 whitespace-nowrap">
                @foreach($item['time_id'] as $index => $time)
                <div class="bg-blue-200 text-blue-600 font-medium rounded-lg p-1 text-center w-full flex justify-center items-center text-[13px]">
                    {{ $time }}
                </div>
                @endforeach
                </div>
                <p class="text-[20px] font-medium text-gray-800">Purpose:</p>
                <p class="text-gray-600 text-[15px]">{{ $item['purpose'] }}</p>
            </div>
        </div>
      @endforeach

    </div>
  </div>

  @if ($data->hasPages())
  <nav role="navigation" aria-label="Pagination" class="flex justify-center mt-4">
      {{-- Previous Page Link --}}
      @if ($data->onFirstPage())
          <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">« Previous</span>
      @else
          <a href="{{ $data->previousPageUrl() }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">« Previous</a>
      @endif
  
      {{-- Pagination Links --}}
      @foreach ($data->links()->elements[0] as $page => $url)
          @if ($page == $data->currentPage())
              <span class="px-3 py-1 mx-1 text-white bg-blue-500 rounded">{{ $page }}</span>
          @else
              <a href="{{ $url }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
          @endif
      @endforeach
  
      {{-- Next Page Link --}}
      @if ($data->hasMorePages())
          <a href="{{ $data->nextPageUrl() }}&search={{ request('search') }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">Next »</a>
      @else
          <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Next »</span>
      @endif
  </nav>
  @endif 
@endsection