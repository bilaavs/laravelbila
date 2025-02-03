<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all(); // Ambil semua genre dari database
        return view('template.separate.genres', compact('genres')); // Arahkan ke lokasi yang benar
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Genre::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Genre berhasil ditambahkan!');
    }
    public function destroy($id)
{
    $genre = Genre::findOrFail($id);
    $genre->delete();

    return redirect()->back()->with('success', 'Genre berhasil dihapus!');
}

}
