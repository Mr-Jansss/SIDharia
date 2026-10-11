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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_name');
            $table->string('reporter_email');
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['pending', 'processed', 'resolved'])->default('pending');
            $table->text('admin_reply')->nullable();
            $table->timestamps();
            
            $table->index('reporter_email');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
