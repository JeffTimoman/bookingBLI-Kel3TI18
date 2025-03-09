@extends('layout.room')
  
@section('content')
<!-- Wrapper untuk Navbar dan Header -->
<div class="relative h-[368px]" style="background-image: url('{{ asset('./assets/bgheader.png') }}')">
  <!-- Header Background -->
    <div class=" flex w-full h-full flex-col justify-center items-center text-white text-center">
      <h1 class="text-4xl mt-20 font-bold">ROOM {{ $data->name }}</h1>
      <div class="w-12 h-1 bg-white my-4"></div>
      <p class="text-lg">{{ $data->roomType->name }} / 2nd Floor / Tower {{ substr($data->name, 0, 1) }}</p>
    </div>
</div>

  


<!-- Blue Line -->
<div class="absolute left-0 w-full h-[116px] bg-[#6995CB]" style="top: 760px;"></div>


<!-- Main Content Section -->
<div class="max-w-7xl mx-auto px-6 md:px-8 lg:px-12 relative z-20 " style="margin-top: 80px;">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start ">
      <!-- Left: Image Section -->
      <div class="flex justify-center items-center relative z-30">
        <img 
          src="{{ asset('rooms/' . $data->img) }}" 
          alt="Room Image" 
          class="w-full max-w-[721px] h-auto object-cover rounded-lg shadow-lg"
        />
        <button 
          id="loveButton" 
          class="absolute top-4 right-4 p-2 focus:outline-none transition-all duration-300"
          data-room-id="{{ $data->id }}"
          data-is-favorited="{{ auth()->check() && auth()->user()->favorites->contains($data->id) ? 'true' : 'false' }}"
        >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500" id="heartIcon">
            <path 
              fill="{{ auth()->check() && auth()->user()->favorites->contains($data->id) ? 'red' : 'gray' }}" 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M12 21l-1-1c-5.5-5.5-9-9-9-12a5 5 0 0110-4 5 5 0 0110 4c0 3-3.5 6.5-9 12l-1 1z"
            ></path>
          </svg>
        </button>
    </div>

    <script>
        const loveButton = document.getElementById('loveButton');
        const heartIcon = document.getElementById('heartIcon');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const roomId = loveButton.dataset.roomId;

        loveButton.addEventListener('click', async () => {
            // Only proceed if user is authenticated
            @if(auth()->check())
            {
                const isFavorited = heartIcon.querySelector('path').getAttribute('fill') === 'red';
                const url = `/rooms/${roomId}/favorite`;
                const method = isFavorited ? 'DELETE' : 'POST';

                try {
                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                    });

                    if (response.ok) {
                        // Toggle the UI state
                        if (isFavorited) {
                            heartIcon.querySelector('path').setAttribute('fill', 'gray');
                            heartIcon.classList.remove('text-red-700');
                            heartIcon.classList.add('text-gray-500');
                        } else {
                            heartIcon.querySelector('path').setAttribute('fill', 'red');
                            heartIcon.classList.remove('text-gray-500');
                            heartIcon.classList.add('text-red-700');
                        }
                    } else {
                        const error = await response.json();
                        console.error('Error:', error.message);
                        // Optionally revert UI changes
                    }
                } catch (error) {
                    console.error('Network error:', error);
                }
            }
            @else
            {
                // Redirect to login or show login modal
                window.location.href = '{{ route('login') }}';
            }
            @endif
        });
    </script>
      
      <!-- Right: Features & Description Section -->
      <div class="space-y-6 relative z-20">
        <!-- Features Section -->
        <div class="relative z-20">
          <h2 class="text-xl font-bold text-gray-800" style="margin-bottom: 50px;">Features</h2>
          <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700">
            <ul class="space-y-2">
              <li>WIFI</li>
              <li>SOFA</li>
              <li>ROUND TABLE</li>
              <li>FAN/SAK</li>
            </ul>
            <ul class="space-y-2">
              <li>ACCOMMODATE 20 PEOPLE</li>
              <li>NIV/A XML</li>
              <li>SAF.I/A</li>
              <li>AHS/FBI</li>
            </ul>
          </div>
  
         <!-- Icon Section -->
    <div class="flex justify-center gap-10 mt-6 flex-wrap">
    <div class="flex items-center justify-center w-20 h-20">
        <img src="{{ asset('./assets/wifi icon.png') }}" alt="WiFi Icon" class="max-h-full max-w-full object-contain">
    </div>
    <div class="flex items-center justify-center w-20 h-20">
        <img src="{{ asset('./assets/sofa icon.png') }}" alt="Sofa Icon" class="max-h-full max-w-full object-contain">
    </div>
    <div class="flex items-center justify-center w-20 h-20">
        <img src="{{ asset('./assets/round table icon.png') }}" alt="Round Table Icon" class="max-h-full max-w-full object-contain">
    </div>
    <div class="flex items-center justify-center w-20 h-20">
        <img src="{{ asset('./assets/projector icon.png') }}" alt="Fan Icon" class="max-h-full max-w-full object-contain">
    </div>
</div>
        </div>
  
        <!-- Title Room Section -->
        <div class="relative z-10 text-center py-6">
          <h1 class="text-3xl font-bold text-gray-800">{{ $data->roomType->name }}</h1>
        </div>
  
        <!-- Description Section -->
        <div class="relative z-10;">
          <h2 class="text-xl font-bold text-gray-800">Description</h2>
          <p class="mt-2 text-gray-600">
            {{ $data->description }}
          </p>
        </div>
      </div>
    </div>

    <!-- Time Slot Section -->
    <div class="mt-8">
      <h2 class="text-xl font-bold text-gray-800">SELECT TIME</h2>
        <div class="flex flex-wrap justify-start mt-4 mb-8">
          @php
          $count = 0;   
          @endphp
          @foreach ($data->times as $index => $time) <!-- Correct way to get index and time -->
          @if ($time->status == 0)
              <button class="flex flex-col items-center justify-center w-[190px] h-[190px] bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="{{ $time->start }} - {{ $time->end }}" disabled>
                  <img src="{{ asset('./assets/time (' . $index . ').svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
                  <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
                  <p class="hidden timeId">{{ $time->id }}</p>
              </button>
          @else
              @php
                $count++;
              @endphp
              <button class="flex flex-col items-center justify-center w-[190px] h-[190px] bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot active:scale-95 active:bg-blue-400" data-time="{{ $time->start }} - {{ $time->end }}">
                  <img src="{{ asset('./assets/time (' . $index . ').svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
                  <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
                  <p class="hidden timeId">{{ $time->id }}</p>
              </button>
          @endif
      @endforeach
      </div>
       @if ($count != 0)
        <div class="mt-8 mb-8 flex justify-end">  
            <button onclick="openModal()" class="px-6 py-2 border-2 border-blue-800 text-blue-800 rounded-lg hover:bg-blue-100">
              BOOK
            </button>
          </div>
        @endif
     </div>
    </div>


  </div>




<div id="bookingModal" class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
  <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-[15px] bg-white">
      <form action="{{ route('book.store') }}" method="POST">
          @csrf
          <div class="mt-3 text-center">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Room {{ $data->name }}</h3>
              <button type="button" onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </button>
              <div class="mt-2 px-7 py-3">
                  <input type="hidden" name="room_id" value="{{ $data->id }}">

                  <div class="mb-4">
                      <h4 class="text-left text-sm font-semibold mb-2">Chosen Time</h4>
                      <div id="chosenTime" class="text-left text-sm mb-2"></div>
                  </div>

                  <h4 class="text-left text-sm font-semibold mb-2">Details</h4>
                  <div class="text-left text-sm mb-2">Name: {{ $user->name }}</div>
                  <div class="text-left text-sm mb-2">Occupation or Affiliation: {{ $user->userType->name }}</div>

                  <div class="text-left text-sm mb-2">
                      <label class="block text-left text-sm font-medium mb-1">Number of People</label>
                      <select name="people" id="people" class="border rounded px-2 py-1 w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                          @for ($i = 1; $i <= 10; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                      </select>
                  </div>

                  <div class="text-left text-sm mb-2">
                      <label for="purpose" class="block text-left text-sm font-medium mb-1">Purpose</label>
                      <input type="text" name="purpose" id="purpose" class="border rounded px-2 py-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g. Group study, Meeting" required/>
                  </div>
              </div>

              <input type="hidden" name="selected_times_id" id="selected_times_id">
              <div class="items-center px-4 py-3">
                  <div class="flex justify-between">
                      <a type="button" onclick="closeModal()" class="bg-transparent text-gray-600 py-2 px-4 border rounded-[22px] hover:bg-gray-100">Cancel</a>
                      <button type="submit" class="bg-gray-900 text-white py-2 px-4 rounded-[22px] hover:bg-gray-700">Submit</button>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>



<script>
  const modal = document.getElementById('bookingModal');
  const chosenTimeDiv = document.getElementById('chosenTime');
  let selectedTimes = [];
  let selectedTimeIds = [];

  function openModal() {
    console.log(selectedTimeIds);
      if (selectedTimes.length === 0){
        alert("Please select at least 1 time slot")
      } else {
          chosenTimeDiv.innerHTML = selectedTimes.map(time => `<p>${time}</p>`).join('');
          document.getElementById('selected_times_id').value = JSON.stringify(selectedTimeIds); // Convert array to JSON string
          modal.classList.remove('hidden');
      }
  }

  function closeModal() {
    modal.classList.add('hidden');
  }
  
   function submitBooking() {
          alert("Booking submitted!");
          closeModal();
    }


const timeSlots = document.querySelectorAll('.time-slot');

  timeSlots.forEach(slot => {
    slot.addEventListener('click', function() {
    console.log(selectedTimeIds);
        const time = this.getAttribute('data-time');
          if (this.classList.contains('bg-blue-400')) {
              this.classList.remove('bg-blue-400');
              this.classList.add('hover:bg-blue-300');
              this.classList.remove('hover:bg-blue-500');
              selectedTimes = selectedTimes.filter(t => t !== time);
              selectedTimeIds = selectedTimeIds.filter(id => id !== this.querySelector('.timeId').textContent);
          } else {
            this.classList.add('bg-blue-400');
            this.classList.remove('hover:bg-blue-300');
            this.classList.add('hover:bg-blue-500');
            selectedTimes.push(time);
            selectedTimeIds.push(this.querySelector('.timeId').textContent);
        }
    });
  });

</script>
@endsection