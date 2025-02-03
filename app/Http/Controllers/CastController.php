<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::all();
        return view('template.separate.casts', compact('casts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:45',
            'umur' => 'nullable|integer',
            'bio' => 'nullable|string',
        ]);

        Cast::create($request->all());

        return redirect()->route('casts')->with('success', 'Cast berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Cast::findOrFail($id)->delete();
        return redirect()->route('casts')->with('success', 'Cast berhasil dihapus.');
    }
}
