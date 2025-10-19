@props(['movie'])

<a href="{{ route('movie.show', $movie) }}" class="movie-card-link">
  <div class="movie-card">

    {{-- Cover --}}
    <div class="movie-card-cover-wrapper">
      <img src="{{ asset('storage/' . $movie->cover) }}" alt="{{ $movie->title }}"
           class="movie-card-image">
    </div>

    {{-- Rating --}}
    <div class="movie-card-rating">
      @for ($i = 1; $i <= floor($movie->rating); $i++)
        <span>★</span>
      @endfor
      @if (($movie->rating) - floor($movie->rating) >= 0.5)
        <span>½</span>
      @endif
    </div>
    
  </div>
</a>
