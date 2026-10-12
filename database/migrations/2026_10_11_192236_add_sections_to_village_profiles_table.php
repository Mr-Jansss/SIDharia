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
        Schema::table('village_profiles', function (Blueprint $table) {
            // Rename existing columns to match Indonesian
            $table->renameColumn('history', 'sejarah');
            $table->renameColumn('vision', 'visi');
            $table->renameColumn('mission', 'misi');
        });
        
        Schema::table('village_profiles', function (Blueprint $table) {
            // Add new comprehensive columns
            $table->string('village_name')->default('Desa Wisata Haria')->after('id');
            $table->text('profile_overview')->nullable()->after('village_name');
            $table->text('pemerintahan')->nullable()->after('misi');
            $table->text('struktur_organisasi')->nullable()->after('pemerintahan');
            $table->string('logo')->nullable()->after('struktur_organisasi');
            $table->string('address')->nullable()->after('logo');
            $table->string('phone')->nullable()->after('address');
            $table->string('email')->nullable()->after('phone');
            $table->string('website')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'village_name',
                'profile_overview',
                'pemerintahan',
                'struktur_organisasi',
                'logo',
                'address',
                'phone',
                'email',
                'website',
            ]);
        });
        
        Schema::table('village_profiles', function (Blueprint $table) {
            $table->renameColumn('sejarah', 'history');
            $table->renameColumn('visi', 'vision');
            $table->renameColumn('misi', 'mission');
        });
    }
};
