<?php



namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();
    
        if ($request->has('title') && $request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        // $movies = $query->paginate(10);
    
        if ($request->has('genre') && $request->genre) {
            $query->where('genre_id', $request->genre);
        }
    
        if ($request->has('release_date') && $request->release_date) {
            $query->whereDate('release_date', $request->release_date);
        }
    
        $movies = $query->get();
        $genres = Genre::all(); 
    
        return view('movies.index', compact('movies', 'genres'));
    }
    

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|string|max:255',
            'intro' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie added successfully');
    }


    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|string|max:255',
            'intro' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully');
    }


    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }


    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

}
