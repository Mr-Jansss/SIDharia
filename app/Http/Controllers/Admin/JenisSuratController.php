<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisSurats = JenisSurat::ordered()->paginate(15);
        return view('admin.jenis-surat.index', compact('jenisSurats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis-surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:255',
            'persyaratan' => 'required|array|min:1',
            'persyaratan.*' => 'required|string|max:500',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
        ]);

        // Filter empty persyaratan
        $validated['persyaratan'] = array_filter($validated['persyaratan'], function($item) {
            return !empty(trim($item));
        });

        // Re-index array
        $validated['persyaratan'] = array_values($validated['persyaratan']);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['urutan'] = $validated['urutan'] ?? 0;

        JenisSurat::create($validated);

        return redirect()
            ->route('admin.jenis-surat.index')
            ->with('success', 'Jenis surat berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        return view('admin.jenis-surat.edit', compact('jenisSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:255',
            'persyaratan' => 'required|array|min:1',
            'persyaratan.*' => 'required|string|max:500',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
        ]);

        // Filter empty persyaratan
        $validated['persyaratan'] = array_filter($validated['persyaratan'], function($item) {
            return !empty(trim($item));
        });

        // Re-index array
        $validated['persyaratan'] = array_values($validated['persyaratan']);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['urutan'] = $validated['urutan'] ?? 0;

        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->update($validated);

        return redirect()
            ->route('admin.jenis-surat.index')
            ->with('success', 'Jenis surat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->delete();

        return redirect()
            ->route('admin.jenis-surat.index')
            ->with('success', 'Jenis surat berhasil dihapus!');
    }
}
