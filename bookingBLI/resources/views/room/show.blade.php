  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room A2001 - Discussion Room</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">
  
<!-- Wrapper untuk Navbar dan Header -->
<div class="relative h-[362px] ">
  <!-- Header Background -->
  <div class="absolute inset-0 -z-10">
    <img
      src="{{ asset('./assets/bgheader.png') }}"
      alt="Header Image"
      class="w-full h-[362px] object-cover"
    />
  </div>

  <!-- Navbar -->
  <nav class="bg-[#174AA9] text-[#FFF] py-4 px-6 flex items-center justify-between shadow-md rounded-b-[22px] relative z-10">
      <!-- Left Section -->
      <div class="flex items-center gap-8">
          <img src="{{ asset('./assets/LOGO BLI.png') }}" alt="Logo" class="h-16 w-auto ml-4">
          <img src="{{ asset('./assets/bca learning.png') }}" alt="BCA Learning" class="h-14 w-auto">
      </div>

      <!-- Center Section -->
      <div class="flex gap-14 text-[18px] font-semibold tracking-[1.08px] ml-auto hidden lg:flex">
          <a href="#" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">FAVORITE</a>
          <a href="/room" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">BOOK</a>
          <a href="#" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">HISTORY</a>
      </div>

      <!-- Right Section -->
      <div class="flex items-center gap-10 ml-14 hidden lg:flex">
          <img src="{{ asset('./assets/icon.png') }}" alt="Bell" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          <img src="{{ asset('./assets/base.png') }}" alt="Logout" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
      </div>

      <!-- Hamburger Icon (for small screens) -->
      <div class="lg:hidden flex items-center">
          <button id="hamburger-icon" class="text-white">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
          </button>
      </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="lg:hidden fixed top-0 right-0 w-56 h-auto bg-[#2D5C97] text-[#FFF] z-50 transform translate-x-full transition-transform duration-300">
      <!-- Close Button -->
      <div class="flex justify-end p-4">
          <button id="close-menu" class="text-white">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
          </button>
      </div>
      <!-- Menu Items -->
      <div class="flex flex-col items-start p-4">
          <a href="#" class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">FAVORITE</a>
          <a href="#" class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">BOOK</a>
          <a href="#" class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">HISTORY</a>
          <div class="flex items-center gap-10 mt-8">
              <img src="{{ asset('./assets/icon.png') }}" alt="Bell" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
              <img src="{{ asset('./assets/base.png') }}" alt="Logout" class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
      </div>
  </div>

  <script>
      // JavaScript to toggle the mobile menu visibility
      const hamburgerIcon = document.getElementById('hamburger-icon');
      const mobileMenu = document.getElementById('mobile-menu');
      const closeMenuButton = document.getElementById('close-menu');

      // Open mobile menu
      hamburgerIcon.addEventListener('click', () => {
          mobileMenu.classList.toggle('translate-x-full'); // Show the menu
      });

      // Close mobile menu
      closeMenuButton.addEventListener('click', () => {
          mobileMenu.classList.add('translate-x-full'); // Hide the menu
      });
  </script>

  <!-- Header Section -->
<div class="relative h-[200px]">
  <!-- Overlay with Text -->
  <div class="absolute inset-0 flex flex-col items-center justify-end text-white text-center pb-200">
    <h1 class="text-4xl font-bold">ROOM {{ $data->name }}</h1>
    <div class="w-12 h-1 bg-white my-4"></div>
    <p class="text-lg">{{ $data->roomType->name }} / 2nd Floor / Tower {{ substr($data->name, 0, 1) }}</p>
  </div>
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
          src="{{ asset('./assets/pic.png') }}" 
          alt="Building Image" 
          class="w-full max-w-[721px] h-auto  object-cover rounded-lg shadow-lg"
        />
        <button id="loveButton" class="absolute top-4 right-4 p-2 focus:outline-none transition-all duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500" id="heartIcon">
            <path fill="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l-1-1c-5.5-5.5-9-9-9-12a5 5 0 0110-4 5 5 0 0110 4c0 3-3.5 6.5-9 12l-1 1z"></path>
          </svg>
        </button>
      </div>
      
      <script>
        // Mendapatkan tombol dan ikon heart
        const loveButton = document.getElementById('loveButton');
        const heartIcon = document.getElementById('heartIcon');
        
        // Menambahkan event listener untuk menangani klik
        loveButton.addEventListener('click', () => {
          // Cek apakah tombol sudah dalam keadaan aktif (merah)
          if (heartIcon.classList.contains('text-gray-500')) {
            heartIcon.classList.remove('text-gray-500');
            heartIcon.classList.add('text-red-700'); // Mengubah warna di dalam hati menjadi merah
            heartIcon.querySelector('path').setAttribute('fill', 'red');  // Mengubah warna fill menjadi merah
          } else {
            heartIcon.classList.remove('text-red-700');
            heartIcon.classList.add('text-gray-500'); // Mengubah warna di dalam hati kembali ke abu-abu
            heartIcon.querySelector('path').setAttribute('fill', 'gray'); // Mengubah warna fill menjadi abu-abu
          }
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
            <ul class="space-y-2 text-right">
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
        <div class="flex flex-wrap justify-start mt-4">
          {{-- @foreach($time as $index)
            @if($index && $index->status == True)
                <button class="flex flex-col items-center justify-center w-[190px] h-[190px] bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="08:00 - 09:30 AM">
                    <img src="{{ asset('./assets/time (' . $index . ').svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
                    <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
                </button>
            @else
                <button class="flex flex-col items-center justify-center w-[190px] h-[190px] bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="08:00 - 09:30 AM">
                    <img src="{{ asset('./assets/time (' . $index . ').svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
                    <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
                </button>
            @endif
          @endforeach --}}
        <!-- Time Slot Box 1 -->
        @if($time->status == 0)
        <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="08:00 - 09:30 AM">
            <img src="{{ asset('./assets/time (0).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
        <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="08:00 - 09:30 AM">
            <img src="{{ asset('./assets/time (0).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
          </button>
        @endif
          
           <!-- Time Slot Box 2 -->
        @if($time->status == 0)
           <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="10:00 - 11:30 AM">
            <img src="{{ asset('./assets/time (1).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="10:00 - 11:30 AM">
            <img src="{{ asset('./assets/time (1).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
              <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
          </button>
        @endif
        
          <!-- Time Slot Box 3 -->
        @if($time->status == 0)
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="01:00 - 02:30 PM">
            <img src="{{ asset('./assets/time (2).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="01:00 - 02:30 PM">
            <img src="{{ asset('./assets/time (2).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
          </button>
        @endif

        <!-- Time Slot Box 4 -->
        @if($time->status == 0)   
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="03:00 - 05:00 PM">
            <img src="{{ asset('./assets/time (3).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
             <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="03:00 - 05:00 PM">
            <img src="{{ asset('./assets/time (3).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
             <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
          </button>
        @endif
          
        <!-- Time Slot Box 5 -->
        @if($time->status == 0)
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="05:00 - 06:00 PM">
              <img src="{{ asset('./assets/time (4).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="05:00 - 06:00 PM">
              <img src="{{ asset('./assets/time (4).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
          </button>
        @endif

        <!-- Time Slot Box 6 -->
        @if($time->status == 0)
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-gray-300 text-gray-500 cursor-not-allowed time-slot" data-time="06:00 - 07:00 PM">
              <img src="{{ asset('./assets/time (5).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon1.png') }}" alt="Group Icon" class="h-39 w-59 mt-2 opacity-40">
          </button>
        @else
          <button class="flex flex-col items-center justify-center w-[190px] h-[190px]  bg-blue-200 text-blue-800 hover:bg-blue-300 time-slot" data-time="06:00 - 07:00 PM">
              <img src="{{ asset('./assets/time (5).svg') }}" alt="Clock Icon" class="h-63 w-136 mb-2">
               <img src="{{ asset('./assets/icon.svg') }}" alt="Group Icon" class="h-39 w-59 mt-2">
        </button>
        @endif
      </div>
       <div class="mt-8 flex justify-end">
           <button onclick="openModal()" class="px-6 py-2 border-2 border-blue-800 text-blue-800 rounded-lg hover:bg-blue-100">
        BOOK
           </button>
        </div>
    </div>


  </div>

<!-- Footer -->
<div class="bg-gradient-to-b from-[#004AAD] to-[#00092D] text-white mt-10">
    <footer class="w-full py-10 px-6 md:px-12 lg:px-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Left Section - Logo -->
            <div class="flex flex-col items-start gap-2">
                <img src="footer/logos.svg" alt="BCA Logo" class="h-40">
            </div>

            <!-- Middle Left - Lokasi -->
            <div>
                <h3 class="text-sm font-normal mb-3">Lokasi</h3>
                <p class="text-sm leading-8 font-normal tracking-wider">
                    Sentul City<br>
                    Jl. Pakuan No. 3, Sumur Batu, Babakan Madang, <br>
                    Bogor 16810
                </p>
            </div>

            <!-- Middle Right - Hubungi Kami -->
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

            <!-- Right Section - Media Sosial -->
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

  <!-- Modal/Popup -->
  <div id="bookingModal" class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-[15px] bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Room {{ $data->name }}</h3>
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="mt-2 px-7 py-3">
              <div class="mb-4">
                 <h4 class="text-left text-sm font-semibold mb-2">Chosen Time</h4>
                <div id="chosenTime" class="text-left text-sm mb-2"></div>
                </div>
                <h4 class="text-left text-sm font-semibold mb-2">Details</h4>
                 <div class="text-left text-sm mb-2">Name: {{ $user->name }}</div>
                 <div class="text-left text-sm mb-2">Occupation or Affiliation: {{ $user->userType->name }}</div>
                <div class="text-left text-sm mb-2">
                    <label class="block text-left text-sm font-medium mb-1">Number of People</label>
                    <select id="numberOfPeople" class="border rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                     <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                </div>
                <div class="text-left text-sm mb-2">
                    <label for="purpose" class="block text-left text-sm font-medium mb-1">Purpose</label>
                    <input type="text" id="purpose" class="border rounded px-2 py-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.b. Group study; Project discussion; Meeting"/>
                </div>
            </div>
            <div class="items-center px-4 py-3">
              <div class="flex justify-between">
                <button onclick="closeModal()" class="bg-transparent text-gray-600 py-2 px-4 border rounded-[22px]  hover:bg-gray-100">Cancel</button>
                <button onclick="submitBooking()" class="bg-gray-900 text-white py-2 px-4 rounded-[22px] hover:bg-gray-700">Submit</button>
              </div>
            </div>
        </div>
    </div>
</div>


<script>
  const modal = document.getElementById('bookingModal');
  const chosenTimeDiv = document.getElementById('chosenTime');
    let selectedTimes = [];

  function openModal() {
      if (selectedTimes.length === 0){
        alert("Please select at least 1 time slot")
      } else {
            chosenTimeDiv.innerHTML = selectedTimes.map(time => `<p>${time}</p>`).join('');
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
            const time = this.getAttribute('data-time');
             if (this.classList.contains('bg-blue-300')) {
                 this.classList.remove('bg-blue-300');
                  selectedTimes = selectedTimes.filter(t => t !== time);
             } else {
                this.classList.add('bg-blue-300');
               selectedTimes.push(time);
            }

    });
  });

</script>
</body>
</html>