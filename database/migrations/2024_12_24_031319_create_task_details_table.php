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
        Schema::create('task_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->constrained();
            $table->text('description')->nullable();
            $table->enum('preferred_frequency', [
                'Daily',
                'Weekly',
                'Bi-Weekly',
                'Monthly',
                'Quarterly',
                'Biannually',
                'Yearly',
                'Intermittent',
                'Unique'
            ])->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_details');
    }
};
