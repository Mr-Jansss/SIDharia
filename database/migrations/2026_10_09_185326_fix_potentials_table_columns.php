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
        Schema::table('potentials', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('title', 'name');
            $table->renameColumn('image_path', 'image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('potentials', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->renameColumn('image', 'image_path');
        });
    }
};
