{{-- @if($errors->any())
<div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            <button onclick="closePopup()">Try Again</button>
        </div>
    </div>
</div>

<script>
    function closePopup() {
        document.querySelector('.fixed').style.display = 'none';
    }
</script>
<style>
    .alert {
        @apply bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative;
    }
    .alert ul {
        @apply list-disc pl-5;
    }
    .alert button {
        @apply mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded;
    }
</style>
@endif

<!-- resources/views/components/loginpopup.php -->
<div id="loginPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Login Failed</h2>
        <p class="mb-4">Incorrect username or password. Please try again.</p>
        <button onclick="closePopup()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Close</button>
    </div>
</div>

<script>
    function showPopup() {
        document.getElementById('loginPopup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('loginPopup').classList.add('hidden');
    }

    // Show popup if there is an error in the session
    @if(Session::has('error'))
        showPopup();
    @endif
</script> --}}

@if($errors->any() || Session::has('error'))
<div id="loginPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 transition-opacity">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center relative animate-fadeIn">
        <h2 class="text-2xl font-bold text-red-600 mb-2">Login Failed</h2>
        <p class="text-gray-700 mb-4">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <span class="block">{{ $error }}</span>
                @endforeach
            @elseif(Session::has('error'))
                {{ Session::get('error') }}
            @endif
        </p>

        <button onclick="closePopup()" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all">
            Try Again
        </button>
    </div>
</div>

<script>
    function closePopup() {
        const popup = document.getElementById('loginPopup');
        popup.classList.add('opacity-0');
        setTimeout(() => popup.style.display = 'none', 300);
    }

    window.onload = function() {
        const popup = document.getElementById('loginPopup');
        if (popup) {
            popup.style.display = 'flex';
            setTimeout(() => popup.classList.remove('opacity-0'), 10);
        }
    };
</script>

<style>
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
@endif
