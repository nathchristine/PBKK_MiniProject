<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // Index Page
    public function index()
    {
        $movies = Movie::with('genre')->orderBy('created_at', 'desc')->get();
        $heading = 'All Movie';
        return view('movies.index', compact('movies', 'heading'));
    }

    // Create Page
    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('movies.create', compact('genres'));
    }

    // Store New Movie
    public function store(Request $r)
    {
        $data = $r->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'rating' => 'required|numeric|min:0.5|max:5',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'review' => 'nullable|string',
        ]);
        
        // Handle file upload
        if ($r->hasFile('cover')) {
            $coverPath = $r->file('cover')->store('covers', 'public');
            $data['cover'] = $coverPath;
        }
        
        Movie::create($data);
        return redirect()->route('movies.index');
    }
    
    // Show Page
    public function show(Movie $movie) 
    { 
        return view('movies.show', compact('movie')); 
    }

    // Edit Page
    public function edit(Movie $movie) 
    { 
        $genres = Genre::orderBy('name')->get();
        return view('movies.edit', compact('movie', 'genres')); 
    }
    
    // Update Movie
    public function update(Request $r, Movie $movie) 
    { 
        $data = $r->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'rating' => 'required|numeric|min:0.5|max:5',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'review' => 'nullable|string',
        ]);
        
        // Handle file upload
        if ($r->hasFile('cover')) {
            // Delete old cover if exists
            if ($movie->cover && Storage::disk('public')->exists($movie->cover)) {
                Storage::disk('public')->delete($movie->cover);
            }
            
            $coverPath = $r->file('cover')->store('covers', 'public');
            $data['cover'] = $coverPath;
        }
        
        $movie->update($data);
        return redirect()->route('movies.index');
    }

    // Delete Movie
    public function destroy(Movie $movie) 
    { 
        $movie->delete(); 
        return redirect()->route('movies.index');
    }
}