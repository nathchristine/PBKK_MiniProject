<x-app-layout>
  <x-navbar/>

  <main class="movies-index-main">
    <div class="movies-index-container">
      <h1 class="page-heading">Your Reviews ⭐️</h1>

      {{-- Cards --}}
      <div class="movie-grid">
        @forelse ($movies as $movie)
          <x-card :movie="$movie" />
        @empty
          <div class="empty-state">No movies found.</div>
        @endforelse
      </div>
      
    </div>
  </main>
</x-app-layout>
