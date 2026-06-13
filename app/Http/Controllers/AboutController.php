<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('about.index', compact('about'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required',
        ]);

        About::create([
            'desc' => $request->desc,
        ]);

        return redirect()->route('about.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => 'required',
        ]);

        $about = About::findOrFail($id);
        $about->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'Data berhasil dihapus!');
    }
}
