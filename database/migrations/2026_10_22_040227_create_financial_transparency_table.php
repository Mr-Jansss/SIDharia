<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('financial_transparency', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul laporan
            $table->enum('category', ['apb_negeri', 'realisasi_anggaran', 'blt_bansos', 'lppd']); // Kategori laporan
            $table->year('fiscal_year'); // Tahun anggaran
            $table->text('description')->nullable(); // Deskripsi
            $table->decimal('budget_amount', 15, 2)->nullable(); // Nominal anggaran
            $table->decimal('realization_amount', 15, 2)->nullable(); // Nominal realisasi
            $table->decimal('percentage', 5, 2)->nullable(); // Persentase realisasi
            $table->string('pdf_file')->nullable(); // File PDF laporan
            $table->string('infographic_image')->nullable(); // File infografis
            $table->enum('semester', ['1', '2', 'tahunan'])->nullable(); // Periode laporan
            $table->integer('beneficiary_count')->nullable(); // Jumlah KPM (untuk BLT)
            $table->text('additional_data')->nullable(); // Data tambahan dalam format JSON
            $table->boolean('is_published')->default(true); // Status publikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_transparency');
    }
};
