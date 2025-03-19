
@extends('layout/room')

@section('title', 'Rooms')

@section('content')
     <!-- Header -->
    <div class="flex flex-wrap items-center justify-start rounded-lg mx-auto mt-6 md:mt-12 mb-4 md:mb-7 px-6 md:px-24 pt-20">
        <button id="filter-button" class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 mb-2 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 5.25h16.5M6 12h12m-7.5 6.75h3" />
            </svg>
            <span class="ml-1">Filters</span>
        </button>
        <div class="h-6 md:h-8 border-l-2 border-dashed border-gray-400 mx-2 md:mx-4 mb-2 md:mb-0"></div>
        <div id="selected-filters" class="flex flex-wrap gap-2">
        </div>
    </div>

    <!-- Filter Modal -->
    <div id="filter-modal" class="fixed inset-0 w-full h-full bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4 overflow-auto">
    <div class="bg-white rounded-lg px-6 max-w-sm w-full mx-auto max-h-[80vh] overflow-y-auto shadow-lg">
        <div class="flex justify-between items-center sticky top-0 py-6 bg-white z-10">
            <h2 class="text-2xl font-semibold">Filters</h2>
            <button id="close-filter-modal" class="text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="mb-4">
            <h3 class="text-lg font-medium mb-2">Availability</h3>
            <div class="flex items-center justify-between">
                <span>Show available rooms only</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="availability-toggle" value="" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-medium mb-2">Room Type</h3>
            <div class="flex flex-col gap-2">
                <div class="flex items-center">
                    <input type="checkbox" id="discussion-room" value="Discussion Room" class="mr-2 room-type-checkbox">
                    <label for="discussion-room">Discussion Room</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="stadium-classroom" value="Stadium Classroom" class="mr-2 room-type-checkbox">
                    <label for="stadium-classroom">Stadium Classroom</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="regular-classroom" value="Regular Classroom" class="mr-2 room-type-checkbox">
                    <label for="regular-classroom">Regular Classroom</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="computer-room" value="Computer Room" class="mr-2 room-type-checkbox">
                    <label for="computer-room">Computer Room</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="think-tank" value="Think Tank" class="mr-2 room-type-checkbox">
                    <label for="think-tank">Think Tank</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="innovation-room" value="Innovation Room" class="mr-2 room-type-checkbox">
                    <label for="innovation-room">Innovation Room</label>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-medium mb-2">Time</h3>
            <div class="flex flex-col gap-2">
                <div class="flex items-center">
                    <input type="checkbox" id="time-1" value="08:00 AM - 09:30 AM" class="mr-2 time-checkbox">
                    <label for="time-1">08:00 AM - 09:30 AM</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="time-2" value="10:00 AM - 11:30 AM" class="mr-2 time-checkbox">
                    <label for="time-2">10:00 AM - 11:30 AM</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="time-3" value="01:00 PM - 02:30 PM" class="mr-2 time-checkbox">
                    <label for="time-3">01:00 PM - 02:30 PM</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="time-4" value="03:00 PM - 05:00 PM" class="mr-2 time-checkbox">
                    <label for="time-4">03:00 PM - 05:00 PM</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="time-5" value="05:00 PM - 06:00 PM" class="mr-2 time-checkbox">
                    <label for="time-5">05:00 PM - 06:00 PM</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="time-6" value="06:00 PM - 07:30 PM" class="mr-2 time-checkbox">
                    <label for="time-6">06:00 PM - 07:30 PM</label>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center mt-6 sticky bottom-0 bg-white pb-6 pt-4">
            <button id="clear-filter" class="text-gray-500 hover:text-gray-700">Clear</button>
            <button id="apply-filter"
                class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Apply</button>
        </div>
    </div>
</div>


    <!-- Room Cards Container -->
    <div class="flex flex-wrap items-center justify-start rounded-lg mx-auto mt-6 md:mt-12 mb-4 md:mb-7 px-6 md:px-24 min-h-[45vh]">
        <div class="flex flex-col gap-4 md:gap-6 w-full" id="room-cards-container">
            @foreach ($data as $item)
                @if($item->status == True)
                <!-- (Available) -->
                <div class="flex flex-col md:flex-row bg-blue-100 rounded-lg overflow-hidden shadow-md"
                    data-room-type="{{ $item->roomType->name }}" data-time="{{ $item->times->where('status', 1)->map(fn($time) => \Carbon\Carbon::parse($time->start)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($time->end)->format('h:i A'))->implode(',') }}">
                    <!-- Image -->
                    <div class="w-full md:w-1/3">
                        <div class="relative h-60 md:h-auto">
                            <div class="carousel h-60 relative overflow-hidden">
                                <div class="carousel-container h-full flex transition-transform duration-300 overflow-hidden">
                                    <img src="{{ asset('rooms/' . $item->img) }}" alt="Room Image"
                                        class="w-full h-full object-cover flex-shrink-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="flex justify-between flex-col p-4 md:p-6 w-full md:w-2/3">
                        
                        <div class="flex flex-col">
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Room {{ $item->name }}</h2>
                            <p class="text-gray-600 mt-1 text-sm">Floor {{ substr($item->name, 0, 2) }}, {{ $item->roomType->name }}</p>
                            <p class="text-gray-500 mt-1 text-sm">{{ $item->description }}</p>
                        </div>
                        <div class="mt-2 w-100 justify-end flex">
                            <a href="{{ url('/room/'.$item->name) }}">
                                <button class="bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 text-large" href="{{ url('/room/'.$item->name) }}">
                                    Check available hours →
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @elseif($item->status == False )
                <!-- (Unavailable) -->
                <div class="relative flex flex-col md:flex-row bg-blue-100 shadow-lg rounded-xl overflow-hidden unavailable"
                    data-room-type="{{ $item->roomType->name }}" data-time="{{ $item->times->where('status', 1)->map(fn($time) => \Carbon\Carbon::parse($time->start)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($time->end)->format('h:i A'))->implode(',') }}">
                    <!-- Image -->
                    <div class="w-full md:w-1/3 opacity-50">
                        <div class="relative h-60 md:h-auto">
                            <div class="carousel h-60 relative overflow-hidden">
                                <div class="carousel-container h-full flex transition-transform duration-300 overflow-hidden">
                                    <img src="{{ asset('rooms/' . $item->img) }}" alt="Room Image"
                                        class="w-full h-full object-cover flex-shrink-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="p-4 md:p-6 w-full md:w-2/3 flex flex-col justify-between relative">
                        <div class="flex flex-col">
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Room {{ $item->name }}</h2>
                            <p class="text-gray-600 mt-1 text-sm">Floor {{ substr($item->name, 0, 2) }}, {{ $item->roomType->name }}</p>
                            <p class="text-gray-500 mt-1 text-sm">{{ $item->description }}</p>
                        </div>
                        
                    </div>
                    <!-- Dark Overlay -->
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <!-- Room Unavailable Text -->
                    <div class="absolute bottom-0 right-0 m-4 z-10">
                        <span class="text-lg font-bold uppercase text-white">
                            Room Unavailable
                        </span>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    @if ($data->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex justify-center mt-4">
        {{-- Previous Page Link --}}
        @if ($data->onFirstPage())
            <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">« Previous</span>
        @else
            <a href="{{ $data->previousPageUrl() }}&{{ http_build_query(request()->except('page')) }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">« Previous</a>
        @endif

        {{-- Pagination Links --}}
        @foreach ($data->links()->elements[0] as $page => $url)
            @if ($page == $data->currentPage())
                <span class="px-3 py-1 mx-1 text-white bg-blue-500 rounded">{{ $page }}</span>
            @else
                <a href="{{ $url }}&{{ http_build_query(request()->except('page')) }}" class="px-3 py-1 mx-1 bg-gray-200 rounded hover:bg-gray-300">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}&{{ http_build_query(request()->except('page')) }}" class="px-3 py-1 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">Next »</a>
        @else
            <span class="px-3 py-1 mx-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Next »</span>
        @endif
    </nav>
@endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function nextSlide(button) {
                const carousel = button.parentElement;
                const container = carousel.querySelector('.carousel-container');
                const slideWidth = carousel.offsetWidth;

                container.style.transition = 'transform 0.3s ease-in-out';
                container.style.transform = `translateX(-${slideWidth}px)`;

                setTimeout(() => {
                    container.appendChild(container.firstElementChild);
                    container.style.transition = 'none';
                    container.style.transform = 'translateX(0)';
                    setTimeout(() => {
                        container.style.transition = 'transform 0.3s ease-in-out';
                    }, 0);
                }, 300);
            }

            function prevSlide(button) {
                const carousel = button.parentElement;
                const container = carousel.querySelector('.carousel-container');
                const slideWidth = carousel.offsetWidth;

                container.style.transition = 'none';
                container.insertBefore(container.lastElementChild, container.firstElementChild);
                container.style.transform = `translateX(-${slideWidth}px)`;
                setTimeout(() => {
                    container.style.transition = 'transform 0.3s ease-in-out';
                    container.style.transform = 'translateX(0)';
                }, 0);
            }

            // JavaScript for filter modal
            const filterButton = document.getElementById('filter-button');
            const filterModal = document.getElementById('filter-modal');
            const closeFilterModal = document.getElementById('close-filter-modal');
            const clearFilterButton = document.getElementById('clear-filter');
            const applyFilterButton = document.getElementById('apply-filter');
            const selectedFiltersContainer = document.getElementById('selected-filters');
            const roomCardsContainer = document.getElementById('room-cards-container');

            let selectedFilters = {
                availability: false,
                roomTypes: [],
                times: []
            };

            function updateSelectedFilters() {
                selectedFiltersContainer.innerHTML = ''; // Clear previous filters
                let filterBadges = [];

                if (selectedFilters.availability) {
                    filterBadges.push(
                        '<span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-xs">Available Only</span>'
                    );
                }

                selectedFilters.roomTypes.forEach(type => {
                    filterBadges.push(
                        `<span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full text-xs">${type}</span>`
                    );
                });

                selectedFilters.times.forEach(time => {
                    filterBadges.push(
                        `<span class="bg-purple-200 text-purple-800 py-1 px-2 rounded-full text-xs">${time}</span>`
                    );
                });

                selectedFiltersContainer.innerHTML = filterBadges.join('');
            }

            function filterRooms() {
                const roomCards = roomCardsContainer.querySelectorAll('[data-room-type]');
                roomCards.forEach(card => {
                    const roomType = card.dataset.roomType;
                    const roomTime = card.dataset.time ? card.dataset.time.split(',') : [];
                    const matchesRoomType = selectedFilters.roomTypes.length === 0 || selectedFilters.roomTypes.includes(roomType);
                    const matchesTime = selectedFilters.times.length === 0 || selectedFilters.times.some(time => roomTime.includes(time));
                    const isAvailable = !card.classList.contains('unavailable');

                    const matchesAvailability = !selectedFilters.availability || (selectedFilters.availability && isAvailable);

                    if (matchesRoomType && matchesTime && matchesAvailability) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            filterButton.addEventListener('click', () => {
                filterModal.classList.remove('hidden');
                filterModal.classList.add('flex');
            });

            closeFilterModal.addEventListener('click', () => {
                filterModal.classList.add('hidden');
                filterModal.classList.remove('flex');
            });

            clearFilterButton.addEventListener('click', () => {
                // Uncheck all checkboxes
                const checkboxes = filterModal.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectedFilters = {
                    availability: false,
                    roomTypes: [],
                    times: []
                };
                updateSelectedFilters();
                filterRooms();
            });

            applyFilterButton.addEventListener('click', () => {
                filterModal.classList.add('hidden');
                filterModal.classList.remove('flex');

                const availabilityToggle = document.getElementById('availability-toggle');
                selectedFilters.availability = availabilityToggle.checked;

                const roomTypeCheckboxes = filterModal.querySelectorAll('.room-type-checkbox:checked');
                selectedFilters.roomTypes = Array.from(roomTypeCheckboxes).map(checkbox => checkbox.value);

                const timeCheckboxes = filterModal.querySelectorAll('.time-checkbox:checked');
                selectedFilters.times = Array.from(timeCheckboxes).map(checkbox => checkbox.value);

                updateSelectedFilters();
                filterRooms();
            });
        });

        

    </script>
@endsection