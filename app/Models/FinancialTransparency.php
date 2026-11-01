<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransparency extends Model
{
    use HasFactory;

    protected $table = 'financial_transparency';

    protected $fillable = [
        'title',
        'category',
        'fiscal_year',
        'description',
        'budget_amount',
        'realization_amount',
        'percentage',
        'pdf_file',
        'infographic_image',
        'semester',
        'beneficiary_count',
        'additional_data',
        'is_published',
    ];

    protected $casts = [
        'budget_amount' => 'decimal:2',
        'realization_amount' => 'decimal:2',
        'percentage' => 'decimal:2',
        'is_published' => 'boolean',
        'additional_data' => 'array',
    ];

    // Scope untuk filter berdasarkan kategori
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope untuk filter berdasarkan tahun
    public function scopeFiscalYear($query, $year)
    {
        return $query->where('fiscal_year', $year);
    }

    // Scope untuk data yang dipublikasikan
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Helper untuk format rupiah
    public function getFormattedBudgetAttribute()
    {
        return 'Rp ' . number_format($this->budget_amount, 0, ',', '.');
    }

    public function getFormattedRealizationAttribute()
    {
        return 'Rp ' . number_format($this->realization_amount, 0, ',', '.');
    }

    // Helper untuk nama kategori
    public function getCategoryNameAttribute()
    {
        $categories = [
            'apb_negeri' => 'APB Negeri',
            'realisasi_anggaran' => 'Laporan Realisasi Anggaran',
            'blt_bansos' => 'Penyaluran BLT & Bansos',
            'lppd' => 'Laporan Pertanggungjawaban (LPPD)',
        ];

        return $categories[$this->category] ?? $this->category;
    }
}
