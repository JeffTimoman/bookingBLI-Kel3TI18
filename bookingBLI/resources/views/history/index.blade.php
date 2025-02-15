
@extends('layout/room')

@section('content')
<main class="container min-h-screen  mx-auto px-4 py-8">
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
    @php
    $flag = 0
    @endphp
    @foreach ($data as $item)
        @if($flag == 0)

            @if(($item['status'] == 0 || $item['status'] == 1 || $item['status'] == -1)) 
                <div id="cardHistories" style="width: 90%;" class="relative rounded-2xl shadow-lg flex md:flex-row gap-6 mb-10 items-stretch bg-blue-100" date="{{ $item['date'] }}">
                    @if($item['status'] == -1)
                        <div class="absolute z-20 top-0 left-0 w-full h-full bg-black opacity-70 rounded-2xl"></div>
                    @endif
                    <!-- Image Slider -->   
                    <div class="relative w-full md:w-1/2 h-full overflow-hidden rounded-l-2xl">
                        <div class="relative aspect-video h-full w-full">
                            <img id="slider-image" src="{{ asset('./landing/BLI_aerialview 1.png') }}" alt="Room Image" class="object-cover w-full h-full transition-all duration-500">
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="flex flex-col w-full md:w-1/2 p-6">
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
                        <p class="text-gray-600 mb-4 text-[20px]">{{ \Carbon\Carbon::parse($item['date'])->format('l, jS F Y') }}</p>
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
                    </div>
                </div>
            
            @endif
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

    </script>
  </main>
  <script>
    const images = [
        "./assets/BLI_aerialview 1.png",
        "./assets/BLI_fullview.jpg",
        "./assets/BLI_aerialview 1.png",
    ];

    let currentIndex = 0;
    const sliderImage = document.getElementById('slider-image');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const dots = document.querySelectorAll('.dot');

    // Function to update image and active dot
    function updateSlider(index) {
        currentIndex = index;
        sliderImage.src = images[currentIndex];
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-gray-800', i === currentIndex);
            dot.classList.toggle('bg-gray-300', i !== currentIndex);
        });
    }

    // Event listeners for buttons
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlider(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider(currentIndex);
    });

    // Auto-play slider every 5 seconds
    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider(currentIndex);
    }, 5000);

    // Event listeners for dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => updateSlider(index));
    });

    // Initialize slider
    updateSlider(currentIndex);
</script>
@endsection