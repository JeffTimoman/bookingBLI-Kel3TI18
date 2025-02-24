<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    @font-face {
      font-family: 'Albert Sans Black';
      src: url('./assets/tulisan/AlbertSans-Black.ttf') format('truetype');
    }

    @font-face {
      font-family: 'Albert Sans Regular';
      src: url('./assets/tulisan/AlbertSans-Regular.ttf') format('truetype');
    }

    @font-face {
      font-family: 'Albert Sans Thin';
      src: url('./assets/tulisan/AlbertSans-Thin.ttf') format('truetype');
    }

    body {
      font-family: 'Albert Sans Regular';
    }

    ::-webkit-scrollbar {
            display: none;
        }
  </style>
</head>

<body class="bg-gray-50 font-sans antialiased flex h-screen">

    <!-- Sidebar -->
    <aside class="bg-gradient-to-b from-blue-900 to-blue-700 text-white w-[324px] flex-shrink-0 sticky top-0 h-screen">
      <div class="p-4 h-[132px] text-center flex flex-col justify-center">
        <h2 class="text-2xl font-semibold">{{ Auth::user()->name }}</h2>
        <p class="text-lg text-gray-300">{{ Auth::user()->role }}</p>
      </div>

      <nav class="mt-6 pt-6 flex-grow border-t border-white" style="background-image: url({{ asset('./assets/bgsidebar.png') }}); background-size: cover; background-position: center; height: calc(100% - 132px);">
        <a href="{{ route('admin.home.index') }}" class="flex items-center py-2 px-4 hover:bg-indigo-800 active gap-3 mb-4">
          <div class="flex items-center ">
            <img src="{{ asset('./assets/dashboard icon.png') }}" alt="Dashboard" class="h-5 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
          Dashboard
        </a>
        <a href="{{ route('admin.pending.index') }}" class="flex items-center py-2 px-4 hover:bg-indigo-800 active gap-3 mb-4">
          <div class="flex items-center ">
            <img src="{{ asset('./assets/pending.png') }}" alt="Pending" class="h-5 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
          Pending Request
        </a>
        <a href="{{ route('admin.active.index') }}" class="flex items-center py-2 px-4 hover:bg-indigo-800 active gap-3 mb-4">
          <div class="flex items-center ">
            <img src="{{ asset('./assets/active.png') }}" alt="Active Booking" class="h-5 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
          Active Booking 
        </a>
        <a href="{{ route('admin.room.index') }}" class="flex items-center py-2 px-4 hover:bg-indigo-800 active gap-3 mb-4">
          <div class="flex items-center ">
            <img src="{{ asset('./assets/rooms.png') }}" alt="Rooms" class="h-5 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
          Rooms
        </a>
        <a href="{{ route('admin.history.index') }}" class="flex items-center py-2 px-4 hover:bg-indigo-800 active gap-3 mb-4">
          <div class="flex items-center ">
            <img src="{{ asset('./assets/hystory.png') }}" alt="History" class="h-5 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </div>
          History
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-gray-50 overflow-y-auto">

      <!-- T opbar -->
      <header class="bg-[#1954B2] shadow-md p-4 h-[114px] flex items-center justify-between sticky top-0 z-10">
        <div class="flex items-center gap-8">
          <img src="{{ asset('./assets/LOGO BLI.png') }}" alt="Logo" class="h-16 w-auto ml-4">
          <img src="{{ asset('./assets/bca learning.png') }}" alt="BCA Learning" class="h-14 w-auto">
        </div>

        <div class="flex items-center gap-8">
          <a href="{{ route('logout') }}">
            <img src="{{ asset('./assets/base.png') }}" alt="Logout" class="h-8 cursor-pointer hover:opacity-70 hover:scale-110 transition-transform duration-200">
          </a>
        </div>

      </header>

      <div class="bg-gray-50">
        <div class="p-6">
          <!-- Rooms Section -->
          @yield('content')
        </div>
      </div>
    </main>

</body>

</html>
