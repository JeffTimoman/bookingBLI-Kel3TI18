<!-- Navbar -->
<nav
class="bg-[#174AA9] text-[#FFF] w-screen py-4 px-6 flex items-center top-0 justify-between w-100 shadow-md rounded-b-[22px] z-40 {{ $navbarStyle === 'home' ? 'sticky' : 'fixed' }}">
<a href="/home">
    <div class="flex items-center gap-4 md:gap-8">
        <img src="{{ asset('./assets/LOGO BLI.png') }}" alt="Logo" class="h-10 md:h-16 w-auto ml-2 md:ml-4">
        <img src="{{ asset('./assets/bca learning.png') }}" alt="BCA Learning" class="h-10 md:h-14 w-auto">
    </div>
</a>
<div class="hidden lg:flex gap-8 md:gap-14 text-[16px] md:text-[18px] font-semibold tracking-[1.08px] ml-auto">
    <a href="/favorite" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">FAVORITE</a>
    <a href="/room" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">BOOK</a>
    <a href="/history" class="hover:text-gray-300 hover:scale-110 transition-transform duration-200">HISTORY</a>
</div>
<div class="hidden lg:flex items-center gap-6 md:gap-10 ml-6 md:ml-14">
    
    <!----------------------------------------------------------------------------------------------------------------------------------->
    

    <!-- Notification Icon -->
<div class="min-w-fit-content relative">
    <img id="bell-icon" src="{{ asset('./assets/icon.png') }}" alt="Bell"
        class="h-5 md:h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
    
    <!-- Notification Dropdown -->
    <div id="notification-dropdown" class="absolute top-full -right-5 text-black mt-5 w-96 shadow-lg h-full rounded-md
        opacity-0 translate-y-2 scale-95 transition-all duration-300 ease-in-out invisible">
        <div class="p-4 font-light text-2xl flex justify-start bg-[#185BAA] text-left text-white">
            Notifications
        </div>
        
        <div id="notifications-list" class="max-h-60 flex flex-col gap-0.5 overflow-auto bg-[#F1F6FF] border-y-2">
            @foreach(auth()->user()->notifications->sortByDesc('created_at') as $notification)
            <div class="p-2 flex items-center 
                {{ $notification->type === App\Models\Notification::TYPE_APPROVED ? 'bg-[#14AE5C]' : 'bg-[#AE1417]' }} 
                relative cursor-pointer notification-item"
                data-id="{{ $notification->id }}">
                
                <img src="{{ asset($notification->type === App\Models\Notification::TYPE_APPROVED ? './assets/Group 30.png' : './assets/Cancel.png') }}" 
                    alt="{{ $notification->type === App\Models\Notification::TYPE_APPROVED ? 'Approved' : 'Rejected' }} Icon" 
                    class="h-12 w-12 mr-2">
                
                <div>
                    <p class="text-white">
                        {{ $notification->type === App\Models\Notification::TYPE_APPROVED ? 'Booking Approved' : 'Booking Rejected' }}
                    </p>
                    <p class="text-sm text-white">{{ $notification->message }}</p>
                </div>
                
                <button class="absolute top-2 right-2 delete-notification" data-id="{{ $notification->id }}">
                    <img src="{{ asset('./assets/cancel_mini.svg') }}" alt="Delete Icon" class="h-4 w-4 cursor-pointer">
                </button>
            </div>
            @endforeach
        </div>

        <div class="text-right font-light text-black underline bg-[#F1F6FF] p-3 cursor-pointer border-t" id="clear-notifications">
            Clear all
        </div>
    </div>
</div>
    
    
    
    <!----------------------------------------------------------------------------------------------------------------------------------->
    
    <a href="{{ route('logout') }}">
        <img src="{{ asset('./assets/base.png') }}" alt="Logout"
        class="h-5 md:h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
    </a>
</div>

<div class="lg:hidden flex items-center">
    <button id="hamburger-icon" class="text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const bellIcon = document.getElementById("bell-icon");
        const notificationDropdown = document.getElementById("notification-dropdown");
        
        // Toggle notification dropdown
        bellIcon.addEventListener("click", function () {
            notificationDropdown.classList.toggle("opacity-0");
            notificationDropdown.classList.toggle("translate-y-2");
            notificationDropdown.classList.toggle("scale-95");
            notificationDropdown.classList.toggle("invisible");
        });
    
        // Hide when clicking outside
        document.addEventListener("click", function (event) {
            if (!bellIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
                notificationDropdown.classList.add("opacity-0", "translate-y-2", "scale-95", "invisible");
            }
        });
    
        // Mark notification as read (without refreshing the page)
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', function () {
                const notificationId = this.dataset.id;
                
                fetch(`/notifications/${notificationId}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(() => {
                    this.classList.add("opacity-50");
                }).catch(err => console.error(err));
            });
        });
    
        // Delete individual notification
        document.querySelectorAll('.delete-notification').forEach(button => {
            button.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevent triggering notification click
                const notificationId = this.dataset.id;
                
                fetch(`/notifications/${notificationId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(() => {
                    this.closest(".notification-item").remove();
                }).catch(err => console.error(err));
            });
        });
    
        // Clear all notifications
        document.getElementById('clear-notifications').addEventListener('click', function () {
            fetch('/notifications', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => {
                document.getElementById('notifications-list').innerHTML = "";
            }).catch(err => console.error(err));
        });
    });
    </script>