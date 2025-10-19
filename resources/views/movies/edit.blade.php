<x-app-layout>

  <main class="form-container">
    <div class="form-wrapper">
      <div class="form-panel">

        <h1 class="page-heading">Edit Movie</h1>

        {{-- Error --}}
        @if ($errors->any())
          <div class="error-list">
            <ul class="form-error-list">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('movie.update', $movie) }}" enctype="multipart/form-data" class="space-y-4">
          @csrf
          @method('PUT')

          {{-- Title --}}
          <div>
            <label class="form-label">Title</label>
            <input name="title" value="{{ old('title', $movie->title) }}"
                   class="form-input"
                   placeholder="Movie title" required>
          </div>

          {{-- Genre --}}
          <div>
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select" required>
              <option value="" disabled hidden>Select genre</option>
              @foreach($genres as $g)
                <option value="{{ $g->id }}" @selected(old('genre_id', $movie->genre_id)==$g->id)>
                  {{ $g->name }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Rating --}}
          <div>
            <label class="form-label">Rating</label>
            <div class="star-rating-container">
              @for($i = 1; $i <= 5; $i++)
                <div class="star-wrapper" data-star="{{ $i }}">
                  <span class="star-full">★</span>
                  <span class="star-empty">☆</span>
                </div>
              @endfor
              <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', $movie->rating) }}">
              <span id="rating-display">{{ old('rating', $movie->rating) }}</span>
            </div>
          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              const stars = document.querySelectorAll('.star-wrapper');
              const ratingInput = document.getElementById('rating-input');
              const ratingDisplay = document.getElementById('rating-display');
              
              // Set initial rating display
              const initialRating = parseFloat(ratingInput.value) || 0;
              updateStarDisplay(initialRating);
              
              stars.forEach((star, index) => {
                star.addEventListener('click', function(e) {
                  const rect = star.getBoundingClientRect();
                  const clickX = e.clientX - rect.left;
                  const starWidth = rect.width;
                  const starNumber = index + 1;
                  
                  // Determine if click is on left half (0.5) or right half (1.0)
                  let rating;
                  if (clickX < starWidth / 2) {
                    rating = starNumber - 0.5;
                  } else {
                    rating = starNumber;
                  }
                  
                  ratingInput.value = rating;
                  ratingDisplay.textContent = rating;
                  updateStarDisplay(rating);
                });
                
                star.addEventListener('mousemove', function(e) {
                  const rect = star.getBoundingClientRect();
                  const clickX = e.clientX - rect.left;
                  const starWidth = rect.width;
                  const starNumber = index + 1;
                  
                  let rating;
                  if (clickX < starWidth / 2) {
                    rating = starNumber - 0.5;
                  } else {
                    rating = starNumber;
                  }
                  
                  updateStarDisplay(rating);
                });
              });
              
              document.querySelector('.star-rating-container').addEventListener('mouseleave', function() {
                const currentRating = parseFloat(ratingInput.value) || 0;
                updateStarDisplay(currentRating);
              });
              
              function updateStarDisplay(rating) {
                stars.forEach((star, index) => {
                  const starNumber = index + 1;
                  const fullStar = star.querySelector('.star-full');
                  
                  if (rating >= starNumber) {
                    fullStar.style.width = '100%';
                  } else if (rating >= starNumber - 0.5) {
                    fullStar.style.width = '50%';
                  } else {
                    fullStar.style.width = '0%';
                  }
                });
              }
            });
          </script>

          {{-- Cover --}}
          <div>
            <label class="form-label">Cover Image</label>
            <input type="file" name="cover" class="form-input" accept="image/*">
            <p class="form-hint">Upload a new movie poster image (optional - leave empty to keep current image)</p>
          </div>

          {{-- Review --}}
          <div>
            <label class="form-label">Review (optional)</label>
            <textarea name="review" rows="3"
                      class="form-textarea"
                      placeholder="Your short review...">{{ old('review', $movie->review) }}</textarea>
          </div>

          {{-- Save and Cancel Button --}}
          <div class="form-actions">
            <button type="submit" class="navbar-add-btn">Update</button>
            <a href="{{ route('movie.show', $movie) }}" class="btn-cancel">
              Cancel
            </a>
          </div>
        </form>

      </div>
    </div>
  </main>
</x-app-layout>
