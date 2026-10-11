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
        Schema::table('products', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('image_path', 'image');
            $table->renameColumn('owner_name', 'contact_name');
            $table->renameColumn('whatsapp_number', 'contact_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('image', 'image_path');
            $table->renameColumn('contact_name', 'owner_name');
            $table->renameColumn('contact_phone', 'whatsapp_number');
        });
    }
};
