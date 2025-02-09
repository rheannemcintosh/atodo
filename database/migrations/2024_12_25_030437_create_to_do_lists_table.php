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
        Schema::create('to_do_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('type', ['daily', 'weekly', 'monthly', 'quarterly', 'yearly', 'project'])->default('daily');
            $table->string('slug')->unique();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_working_day')->default(false);
            $table->boolean('is_outside_day')->default(false);
            $table->boolean('is_makeup_day')->default(false);
            $table->boolean('is_home_day')->default(false);
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do_lists');
    }
};
