<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestingTable extends Migration
{
    public function up(): void
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 15, 2);   // Investment amount
            $table->string('investment_type');  // Crop, Equipment, etc.
            $table->integer('duration_months'); // Investment duration
            $table->text('notes')->nullable();  // Optional
            $table->string('phone');            // Auto-filled
            $table->string('email');            // Auto-filled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
}
