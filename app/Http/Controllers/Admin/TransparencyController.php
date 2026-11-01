<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialTransparency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransparencyController extends Controller
{
    public function index()
    {
        $transparencies = FinancialTransparency::latest()->get();
        return view('admin.transparency.index', compact('transparencies'));
    }

    public function create()
    {
        return view('admin.transparency.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:apb_negeri,realisasi_anggaran,blt_bansos,lppd',
            'fiscal_year' => 'required|integer|min:2020|max:2100',
            'description' => 'nullable|string',
            'budget_amount' => 'nullable|numeric|min:0',
            'realization_amount' => 'nullable|numeric|min:0',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'semester' => 'nullable|in:1,2,tahunan',
            'beneficiary_count' => 'nullable|integer|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240', // 10MB
            'infographic_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
            'is_published' => 'boolean',
            'additional_data' => 'nullable|json',
        ]);

        // Upload PDF
        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request->file('pdf_file')->store('transparency/pdf', 'public');
        }

        // Upload Infographic
        if ($request->hasFile('infographic_image')) {
            $validated['infographic_image'] = $request->file('infographic_image')->store('transparency/infographic', 'public');
        }

        // Parse additional_data if it's a string
        if (isset($validated['additional_data']) && is_string($validated['additional_data'])) {
            $validated['additional_data'] = json_decode($validated['additional_data'], true);
        }

        // Set default is_published
        $validated['is_published'] = $request->has('is_published');

        FinancialTransparency::create($validated);

        return redirect()
            ->route('admin.transparency.index')
            ->with('success', 'Data transparansi keuangan berhasil ditambahkan!');
    }

    public function edit(FinancialTransparency $transparency)
    {
        return view('admin.transparency.edit', compact('transparency'));
    }

    public function update(Request $request, FinancialTransparency $transparency)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:apb_negeri,realisasi_anggaran,blt_bansos,lppd',
            'fiscal_year' => 'required|integer|min:2020|max:2100',
            'description' => 'nullable|string',
            'budget_amount' => 'nullable|numeric|min:0',
            'realization_amount' => 'nullable|numeric|min:0',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'semester' => 'nullable|in:1,2,tahunan',
            'beneficiary_count' => 'nullable|integer|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'infographic_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_published' => 'boolean',
            'additional_data' => 'nullable|json',
        ]);

        // Upload PDF (replace old)
        if ($request->hasFile('pdf_file')) {
            if ($transparency->pdf_file) {
                Storage::disk('public')->delete($transparency->pdf_file);
            }
            $validated['pdf_file'] = $request->file('pdf_file')->store('transparency/pdf', 'public');
        }

        // Upload Infographic (replace old)
        if ($request->hasFile('infographic_image')) {
            if ($transparency->infographic_image) {
                Storage::disk('public')->delete($transparency->infographic_image);
            }
            $validated['infographic_image'] = $request->file('infographic_image')->store('transparency/infographic', 'public');
        }

        // Parse additional_data if it's a string
        if (isset($validated['additional_data']) && is_string($validated['additional_data'])) {
            $validated['additional_data'] = json_decode($validated['additional_data'], true);
        }

        // Set is_published
        $validated['is_published'] = $request->has('is_published');

        $transparency->update($validated);

        return redirect()
            ->route('admin.transparency.index')
            ->with('success', 'Data transparansi keuangan berhasil diperbarui!');
    }

    public function destroy(FinancialTransparency $transparency)
    {
        // Delete files
        if ($transparency->pdf_file) {
            Storage::disk('public')->delete($transparency->pdf_file);
        }
        if ($transparency->infographic_image) {
            Storage::disk('public')->delete($transparency->infographic_image);
        }

        $transparency->delete();

        return redirect()
            ->route('admin.transparency.index')
            ->with('success', 'Data transparansi keuangan berhasil dihapus!');
    }
}
