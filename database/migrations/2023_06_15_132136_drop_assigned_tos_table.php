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
        Schema::dropIfExists('assigned_tos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('assigned_tos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_tag_id')->constrained()->cascadeOnDelete();
        });
    }
};
