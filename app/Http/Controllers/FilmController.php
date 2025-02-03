<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:45',
            'ringkasan' => 'required',
            'tahun' => 'required|integer',
            'poster' => 'required|max:45',
            'genre_id' => 'required|exists:genres,id'
        ]);

        Film::create($validatedData);
        return redirect()->route('films.index')->with('success', 'Film created successfully');
    }
}