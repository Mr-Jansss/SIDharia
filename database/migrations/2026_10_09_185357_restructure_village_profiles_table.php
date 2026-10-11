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
            // Drop old columns
            $table->dropColumn(['title', 'content', 'type']);
            
            // Add new columns
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            $table->dropColumn(['history', 'vision', 'mission']);
            
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['sejarah', 'visi', 'misi']);
        });
    }
};
