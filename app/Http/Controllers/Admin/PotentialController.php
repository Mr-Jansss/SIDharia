<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::latest()->get();
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        return view('admin.potentials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:wisata,alam,budaya',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('potentials', 'public');
        }

        Potential::create($validated);

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil ditambahkan!');
    }

    public function edit(Potential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, Potential $potential)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:wisata,alam,budaya',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($potential->image) {
                Storage::disk('public')->delete($potential->image);
            }
            $validated['image'] = $request->file('image')->store('potentials', 'public');
        }

        $potential->update($validated);

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil diperbarui!');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->image) {
            Storage::disk('public')->delete($potential->image);
        }

        $potential->delete();

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil dihapus!');
    }
}
