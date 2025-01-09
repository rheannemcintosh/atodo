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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_detail_id')->constrained();
            $table->date('due_date')->nullable();
            $table->date('started_at')->nullable();
            $table->date('completed_at')->nullable();
            $table->enum('status', [
                'To Do',
                'In Progress',
                'Partially Completed',
                'Completed',
                'Cancelled',
            ]);
            $table->json('to_do_list_ids')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
