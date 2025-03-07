@extends('layout/adminTemplate')
@section('content')
<div class="bg-gray-50">
    <section class="mt-2 ml-4 ">
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h2 class="text-2xl font-semibold  text-gray-700">Pending Requests</h2>
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
                @foreach($data as $item)
                    @if($item['status'] == 0 && $item['date'] == now()->toDateString())
                        <div class="bg-[#CCE3FF] rounded-lg shadow-md p-4 w-full">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="font-semibold text-lg text-gray-700">{{ $item['room_name'] }}</h3>
                                <p class="text-xs text-gray-500 tracking-wider">{{ $item['created_at']->format('h:i A') }}</p>
                            </div>

                            <div class="flex">
                                <div class="w-1/2 pr-2">
                                    @foreach($item['time_id'] as $index => $time)
                                        <p class="text-sm text-gray-600 tracking-wider leading-tight">{{ $time }}</p>
                                    @endforeach
                                </div>
                                <div class="w-1/2 pl-2">
                                    <p class="text-xs text-gray-500 tracking-wider">Purpose:</p>
                                    <p class="text-sm text-gray-600 tracking-wider">{{ $item['purpose'] }}</p>
                                </div>
                            </div>

                            <div class="mt-2">
                                <p class="text-sm text-gray-600 tracking-wider">{{ $item['user_name'] }}</p>
                                <p class="text-sm text-gray-600 tracking-wider">{{ $item['user_type'] }}</p>
                                <div class="flex items-center">
                                    <img src="{{ asset('./assets/icon.svg') }}" alt="People Icon" class="w-6 h-6 mr-1">
                                    <span class="text-xs text-gray-500 tracking-wider">{{ $item['people'] }} People</span>
                                </div>
                            </div>

                            <div class="flex justify-center mt-4">
                                <form action="{{ route('admin.pending.change') }}" method="POST">
                                    @csrf
                                    @foreach ($item['book_id'] as $bookId)
                                        <input type="hidden" name="book_id[]" value="{{ $bookId }}">
                                    @endforeach
                                    <input type="hidden" name="user_id" value="{{ $item['user_id'] }}">
                                    <input type="hidden" name="date" value="{{ $item['date'] }}">
                                    <input type="hidden" name="name" value="{{ $item['room_name'] }}">
                                    <input type="hidden" name="status" value="-1">
                                    <button class="bg-red-500 hover:bg-red-700 text-white rounded-full p-2 mr-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('admin.pending.change') }}" method="POST">
                                    @csrf
                                    @foreach ($item['book_id'] as $bookId)
                                        <input type="hidden" name="book_id[]" value="{{ $bookId }}">
                                    @endforeach
                                    <input type="hidden" name="user_id" value="{{ $item['user_id'] }}">
                                    <input type="hidden" name="date" value="{{ $item['date'] }}">
                                    <input type="hidden" name="name" value="{{ $item['room_name'] }}">
                                    <input type="hidden" name="status" value="1">
                                    <button class="bg-green-500 hover:bg-green-700 text-white rounded-full p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection