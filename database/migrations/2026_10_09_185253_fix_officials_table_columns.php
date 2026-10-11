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
        Schema::table('officials', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('image_path', 'photo');
            $table->renameColumn('order_number', 'order');
            
            // Add missing column
            $table->string('phone')->nullable()->after('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('officials', function (Blueprint $table) {
            $table->renameColumn('photo', 'image_path');
            $table->renameColumn('order', 'order_number');
            $table->dropColumn('phone');
        });
    }
};
