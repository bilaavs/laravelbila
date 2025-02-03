<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peran;
use App\Models\Film;
use App\Models\Cast;

class PeranController extends Controller
{
    public function index()
    {
        $perans = Peran::with(['film', 'cast'])->get(); // Memuat relasi film dan cast
        $films = Film::all(); // Ambil semua film untuk dropdown
        $casts = Cast::all(); // Ambil semua cast untuk dropdown
    
        return view('template.separate.perans', compact('perans', 'films', 'casts'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'nama' => 'required|string|max:45',
        ]);

        Peran::create($request->all());

        return redirect()->route('perans')->with('success', 'Peran berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Peran::findOrFail($id)->delete();
        return redirect()->route('perans')->with('success', 'Peran berhasil dihapus.');
    }
}
