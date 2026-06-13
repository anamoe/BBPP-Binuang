<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasaranaSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaPrasaranaSliderController extends Controller
{
    /**
     * Tampilkan daftar slider
     */
    public function index()
    {
        $sliders = SaranaPrasaranaSlider::all();
        return view('sarana_prasarana_slider.index', compact('sliders'));
    }

    /**
     * Form tambah slider
     */
    public function create()
    {
        return view('sarana_prasarana_slider.create');
    }

    /**
     * Simpan slider
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validate['image'] = $request->file('image')->store('sarana_slider', 'public');

        SaranaPrasaranaSlider::create($validate);

        return redirect()->route('sarana_prasarana_slider.index')->with('success', 'Slider berhasil ditambahkan!');
    }

    /**
     * Form edit slider
     */
    public function edit($id)
    {
        $sarana_prasarana_slider = SaranaPrasaranaSlider::find($id);
        return view('sarana_prasarana_slider.edit', compact('sarana_prasarana_slider'));
    }

    /**
     * Update slider
     */
    public function update(Request $request, $id)
    {
        $sarana_prasarana_slider = SaranaPrasaranaSlider::find($id);

        $validate = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($sarana_prasarana_slider->image) {
                Storage::disk('public')->delete($sarana_prasarana_slider->image);
            }
            $validate['image'] = $request->file('image')->store('sarana_slider', 'public');
        }

        $sarana_prasarana_slider->update($validate);

        return redirect()->route('sarana_prasarana_slider.index')->with('success', 'Slider berhasil diperbarui!');
    }

    /**
     * Hapus slider
     */
    public function destroy($id)
    {
        $sarana_prasarana_slider = SaranaPrasaranaSlider::find($id);

        if ($sarana_prasarana_slider->image) {
            Storage::disk('public')->delete($sarana_prasarana_slider->image);
        }

        $sarana_prasarana_slider->delete();

        return redirect()->route('sarana_prasarana_slider.index')->with('success', 'Slider berhasil dihapus!');
    }
}
