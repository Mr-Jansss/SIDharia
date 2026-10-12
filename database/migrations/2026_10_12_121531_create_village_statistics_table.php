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
        Schema::create('village_statistics', function (Blueprint $table) {
            $table->id();
            
            // Data Statistik Umum
            $table->integer('total_kk')->default(0);
            $table->integer('total_penduduk')->default(0);
            
            // Data Jenis Kelamin
            $table->integer('jumlah_laki_laki')->default(0);
            $table->integer('jumlah_perempuan')->default(0);
            
            // Data Pendidikan
            $table->integer('pendidikan_paud')->default(0);
            $table->integer('pendidikan_tk')->default(0);
            $table->integer('pendidikan_sd')->default(0);
            $table->integer('pendidikan_smp')->default(0);
            $table->integer('pendidikan_sma')->default(0);
            $table->integer('pendidikan_s1')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_statistics');
    }
};
