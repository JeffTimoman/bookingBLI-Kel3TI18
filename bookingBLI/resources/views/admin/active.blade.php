@extends('layout/adminTemplate')
@section('content')
<div class="bg-gray-50">
    <section class="mt-2 ml-4">
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h2 class="text-2xl font-semibold text-gray-700">Active Booking</h2>
        </div>
    </section>
    <div class="p-14">
        <section class="mb-8">
            <div class="flex justify-between items-center">
                <p class="text-gray-500">{{ now()->format('l, jS F Y') }}</p>
                <p class="text-gray-500">{{ now()->format('h:i A') }}</p>
            </div>
        </section>

        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-12">

                <!-- Active Booking Card -->
                @foreach($data as $item)
                    @if($item['status'] == 1 && $item['date'] == now()->toDateString())
                    <div class="bg-[#CCE3FF] rounded-lg shadow-md p-4 w-full">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-4xl text-gray-700">Room {{ $item['room_name'] }}</h3>
                                <p class="text-gray-600 font-semibold tracking-wider">{{ $item['user_name'] }}</p>
                                <div class="flex items-center mt-1">
                                    <img src="{{ asset('./assets/icon.svg') }}" alt="People Icon" class="w-6 h-6 mr-1">
                                    <span class="text-gray-500 text-base tracking-wider">{{ $item['people'] }} People</span>
                                </div>
                            </div>
                            <div>
                                @foreach($item['time_id'] as $index => $time)
                                <p class="text-xs text-gray-500 tracking-wider">{{ $time }}</p>
                                @endforeach
                            </div>  
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-600 text-base tracking-wider">Purpose:</p>
                            <p class="text-sm text-gray-600 tracking-wider mb-3">{{ $item['purpose'] }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </section>
    </div>
</div>
@endsection