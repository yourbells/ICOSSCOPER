<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  

  <title>ICOSSCOPER</title>
  
  {{-- Tailwind CSS --}}
  @vite('resources/css/app.css')
  
  {{-- Custom CSS untuk Animasi --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-900">

  {{-- NAVBAR --}}
  @include('partials.navbar')

  {{-- CONTENT --}}
  <main class="mt-8 flex-1 max-w-6xl mx-auto w-full px-4 py-8">
     @hasSection('content')
        @yield('content')
    @else
        {{ $slot ?? '' }}
    @endif
  </main>

  {{-- FOOTER --}}
  @include('partials.footer')

</body>
</html>