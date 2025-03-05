@extends('layout/room')

@section('title', 'History')

@section('content')
<main class="container min-h-screen mx-auto px-4 py-8">
    <div class="flex items-center justify-center mt-[100px] mb-10">
        <div class="relative w-[60vw] h-10 bg-gray-300 rounded-full flex overflow-hidden">
            <!-- Left (Current Session) -->
            <div id="leftTab" class="w-1/2 bg-blue-600 flex items-center justify-center text-white font-bold rounded-full">
                <button id="currentSessionBtn" class="w-full h-full bg-transparent font-bold">
                    Current Session
                </button>
            </div>

            <!-- Right (Past Session) -->
            <div id="rightTab" class="w-1/2 bg-gray-300 flex items-center justify-center text-gray-600 font-bold rounded-full">
                <button id="pastSessionBtn" class="w-full h-full bg-transparent font-bold">
                    Past Session
                </button>
            </div>
        </div>
    </div>

    <div class="w-100 flex flex-col items-center justify-center">
        @foreach ($data as $index => $item)
        @php $uniqueId = uniqid(); @endphp <!-- Generate a unique ID for each item -->
        @if(($item['status'] == 0 || $item['status'] == 1 || $item['status'] == -1)) 
            <div id="cardHistories" style="width: 90%;" 
                class="relative rounded-2xl shadow-lg flex md:flex-row gap-6 mb-10 items-stretch bg-blue-100 p-6" 
                date="{{ $item['date'] }}">

                @if($item['status'] == -1)
                    <div class="absolute z-20 top-0 left-0 w-full h-full bg-black opacity-70 rounded-2xl"></div>
                @endif

                <!-- Image Slider -->   
                <div class="relative w-full md:w-1/2 h-full overflow-hidden rounded-l-2xl">
                    <div class="relative aspect-video h-full w-full">
                        <img id="slider-image" src="{{ asset('rooms/' . $item['room_img']) }}" alt="Room Image" class="object-cover w-full h-full transition-all duration-500">
                    </div>
                </div>

                <!-- Room Details -->
                <div class="flex flex-col w-full md:w-1/2">
                    <div class="flex w-100 justify-between flex-row">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Room {{ $item['room_name'] }}</h2>
                        <div class="flex items-center gap-2">
                            @if($item['status'] == 0)
                            <span class="bg-blue-600 text-white py-2 px-4 rounded-lg font-medium ">Pending</span>
                            @elseif($item['status'] == 1)
                            <span class="bg-green-600 text-white py-2 px-4 rounded-lg font-medium ">Approved</span>
                            @elseif($item['status'] == -1)
                            <span class="bg-red-600 text-white py-2 px-4 rounded-lg z-30 font-medium ">Rejected</span>
                            @endif
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4 text-[20px]">
                        {{ \Carbon\Carbon::parse($item['date'])->format('l, jS F Y') }}
                    </p>

                    <div class="flex items-center gap-2 mb-4 text-gray-700 text-[18px]">
                        <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-4 mt-2 opacity-40">
                        {{ $item['people'] }} People
                    </div>

                    <div class="grid grid-cols-2 gap-2 w-max">
                        @foreach($item['time_id'] as $index => $time)
                            <button class="bg-blue-200 text-blue-600 font-medium px-4 py-2 rounded-lg text-center">
                                {{ $time }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Cancel Button -->
                @if(($item['status'] == 1 || $item['status'] == 0) && $item['date'] == now()->toDateString())
                    <div class="flex justify-end mt-4">
                        <button id="cancelButton{{ $uniqueId }}" 
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all">
                            Cancel
                        </button>
                    </div>
    
                    <div id="cancelModal{{ $uniqueId }}" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden">
                        <div class="bg-white p-8 rounded-lg shadow-md w-[40%] h-auto">
                            <h2 class="text-2xl font-bold mb-4">Cancel Booking</h2>
                            <p class="mb-6">Are you sure you want to cancel this booking?</p>
                            <div class="flex justify-end">
                                <button id="noButton{{ $uniqueId }}" class="px-4 py-2 mr-2 bg-gray-300 hover:bg-gray-400 rounded-lg">No, don't cancel</button>
                                <form action="{{ route('history.destroy', $item['book_id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @foreach($item['book_id'] as $bookId)
                                        <input type="hidden" name="book_id[]" value="{{ $bookId }}">
                                    @endforeach
                                    <button id="yesButton{{ $uniqueId }}" type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Yes, cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        @endif
        @endforeach
    </div>

    <script>
        // Store formatted date in a variable
        function showCurrentSession() {
            const leftTab = document.getElementById("leftTab");
            const rightTab = document.getElementById("rightTab");
            const cardHistories = document.querySelectorAll("#cardHistories"); // Select all cards
            let today = new Date().toISOString().split('T')[0];

            // Activate "Current Session"
            leftTab.classList.replace("bg-gray-300", "bg-blue-600");
            leftTab.classList.replace("text-gray-600", "text-white");

            rightTab.classList.replace("bg-blue-600", "bg-gray-300");
            rightTab.classList.replace("text-white", "text-gray-600");

            cardHistories.forEach(card => {
                let cardDate = card.getAttribute("date");
                if (cardDate === today) {
                    card.classList.remove("hidden"); // Show today's bookings
                    card.classList.add("flex");
                } else {
                    card.classList.remove("flex");
                    card.classList.add("hidden"); // Hide past bookings
                }
            });
        }

        // Run when page loads
        window.onload = showCurrentSession;

        // Add event listeners for buttons
        document.getElementById("currentSessionBtn").addEventListener("click", showCurrentSession);

        document.getElementById("pastSessionBtn").addEventListener("click", function() {
            const leftTab = document.getElementById("leftTab");
            const rightTab = document.getElementById("rightTab");
            const cardHistories = document.querySelectorAll("#cardHistories"); // Select all cards
            let today = new Date().toISOString().split('T')[0];

            // Activate "Past Session"
            rightTab.classList.replace("bg-gray-300", "bg-blue-600");
            rightTab.classList.replace("text-gray-600", "text-white");

            leftTab.classList.replace("bg-blue-600", "bg-gray-300");
            leftTab.classList.replace("text-white", "text-gray-600");

            cardHistories.forEach(card => {
                let cardDate = card.getAttribute("date");
                if (cardDate !== today) {
                    card.classList.remove("hidden"); // Show past bookings
                    card.classList.add("flex");
                } else {
                    card.classList.remove("flex");
                    card.classList.add("hidden"); // Hide today's bookings
                }
            });
        });

        // Modal logic
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[id^="cancelButton"]').forEach(button => {
            button.addEventListener('click', function () {
                const uniqueId = this.id.replace('cancelButton', '');
                document.getElementById(`cancelModal${uniqueId}`).classList.remove('hidden');
            });
        });

        document.querySelectorAll('[id^="noButton"]').forEach(button => {
            button.addEventListener('click', function () {
                const uniqueId = this.id.replace('noButton', '');
                document.getElementById(`cancelModal${uniqueId}`).classList.add('hidden');
            });
        });

        document.querySelectorAll('[id^="yesButton"]').forEach(button => {
            button.addEventListener('click', function () {
                const uniqueId = this.id.replace('yesButton', '');
                document.getElementById(`cancelModal${uniqueId}`).classList.add('hidden');
            });
        });
    });

    </script>
</main>
@endsection