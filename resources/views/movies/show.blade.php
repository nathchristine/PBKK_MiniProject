<x-app-layout>
    <x-navbar/>

  <main class="movie-detail-main">
    <div class="movie-detail-container">

      {{-- Card --}}
      <div class="movie-detail-card">
        <div class="movie-detail-grid">

          {{-- Cover --}}
          <div class="movie-detail-cover-col">
            <div class="movie-detail-cover-wrapper">
              <img src="{{ asset('storage/' . $movie->cover) }}" alt="{{ $movie->title }}"
                   class="movie-detail-cover-image">
            </div>
          </div>

          {{-- Details --}}
          <div class="movie-detail-info-col">
            {{-- Genre --}}
            <span class="movie-detail-genre-pill">
              {{ $movie->genre?->name }}
            </span>

            {{-- Title --}}
            <h1 class="movie-detail-title">
              {{ $movie->title }}
            </h1>

            {{-- Stars --}}
            <div class="movie-detail-stars">
              @for ($i = 1; $i <= floor($movie->rating); $i++)
                <span class="movie-detail-star">★</span>
              @endfor
              @if (($movie->rating) - floor($movie->rating) >= 0.5)
                <span class="movie-detail-star">½</span>
              @endif
            </div>

            {{-- Review --}}
            <div class="movie-detail-review">
              {{ $movie->review ?? 'No review.' }}
            </div>
          </div>
        </div>

        {{-- Actions --}}
        <div class="movie-detail-actions">
          {{-- Back --}}
          <a href="{{ route('movies.index') }}" class="btn-back">
            ← Back
          </a>

          {{-- Edit --}}
          <a href="{{ route('movie.edit', $movie) }}" class="btn-edit">
            ✏️ Edit
          </a>

          {{-- Delete --}}
          <form action="{{ route('movie.destroy', $movie) }}" method="POST"
                onsubmit="return confirm('Delete this movie?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-delete">
              🗑️ Delete
            </button>
          </form>
        </div>
      </div>

    </div>
  </main>
</x-app-layout>
