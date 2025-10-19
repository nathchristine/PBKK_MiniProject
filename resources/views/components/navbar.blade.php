<nav class="navbar">
  <div class="navbar-container">
    <div class="navbar-brand">Movie Review</div>

    <div class="flex items-center gap-4">
      {{-- Add Movie Button --}}
      <a href="{{ route('movie.create') }}" class="navbar-add-btn">
        + Add Movie
      </a>

      {{-- simple dropdown (no JS) using details/summary --}}
      <details class="relative">
        <summary class="navbar-dropdown-summary">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg>
          <span>{{ Auth::user()->name }}</span>
        </summary>
        <div class="navbar-dropdown">
          <form method="POST" action="{{ route('logout') }}" class="p-2">
            @csrf
            <button type="submit" class="navbar-logout-btn">Logout</button>
          </form>
        </div>
      </details>
    </div>
  </div>
</nav>
