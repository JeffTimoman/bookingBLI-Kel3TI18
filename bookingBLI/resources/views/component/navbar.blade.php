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
    <img src="{{ asset('./assets/icon.png') }}" alt="Bell"
        class="h-5 md:h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
        <a href="{{ route('logout') }}"><img src="{{ asset('./assets/base.png') }}" alt="Logout"
            class="h-5 md:h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200"></a>
    
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

<!-- Mobile Menu -->
<div id="mobile-menu"
class="lg:hidden fixed top-0 right-0 w-72 max-w-full h-full bg-[#2D5C97] text-[#FFF] z-50 transform translate-x-full transition-transform duration-300">
<div class="flex justify-end p-4">
    <button id="close-menu" class="text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
<div class="flex flex-col items-start p-4">
    <a href="#"
        class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">FAVORITE</a>
    <a href="#"
        class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">BOOK</a>
    <a href="#"
        class="py-3 text-[18px] font-semibold hover:text-gray-300 hover:scale-110 transition-transform duration-200">HISTORY</a>
    <div class="flex items-center gap-10 mt-8">
        <img src="./assets/icon.png" alt="Bell"
            class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
        <img src="./assets/base.png" alt="Logout"
            class="h-6 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
    </div>
</div>
</div>