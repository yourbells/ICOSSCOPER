<header class="fixed top-0 left-0 w-full bg-sky-600 text-white shadow z-50">  
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex items-center justify-between h-14">
      <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold tracking-wide">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-7 w-7 rounded">
        <span>ICOSSCOPER</span>
      </a>
      <nav class="hidden md:flex items-center gap-6 text-sm">
        <a href="{{ route('home') }}" class="hover:text-white/90">Home</a>
        @auth
          <a href="{{ route('dashboard') }}" class="hover:text-white/90">Profile</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="hover:text-white/90">Logout</button>
          </form>
        @else
          <a href="{{ route('register') }}" class="hover:text-white/90">Register</a>
        @endauth
          </form>
        </div>
      </nav>
    </div>
  </div>
</header>
