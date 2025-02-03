<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->get(); // Ambil data film beserta genre-nya
        $genres = Genre::all(); // Ambil semua genre untuk dropdown
        return view('template.separate.films', compact('films', 'genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'tahun' => 'required|integer',
            'poster' => 'nullable|image',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $film = new Film();
        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->genre_id = $request->genre_id;
        
        if ($request->hasFile('poster')) {
            $fileName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $fileName);
            $film->poster = $fileName;
        }

        $film->save();

        return redirect()->route('films')->with('success', 'Film berhasil ditambahkan.');
    }
    public function destroy($id)
{
    $film = Film::findOrFail($id);

    // Hapus poster jika ada
    if ($film->poster) {
        $posterPath = public_path('uploads/' . $film->poster);
        if (file_exists($posterPath)) {
            unlink($posterPath);
        }
    }

    $film->delete();

    return redirect()->route('films')->with('success', 'Film berhasil dihapus.');
}

}
