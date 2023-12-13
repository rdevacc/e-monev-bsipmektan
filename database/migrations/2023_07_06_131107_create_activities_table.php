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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('department_id');
            $table->foreignId('division_id');
            $table->foreignId('status_id')->default(0);
            $table->string('name');
            $table->float('budget', 16, 2)->default(0);
            $table->float('financial_target', 16, 2)->default(0);
            $table->float('financial_realization', 16, 2)->default(0);
            $table->float('physical_target', 16, 2)->default(0);
            $table->float('physical_realization', 16, 2)->default(0);
            $table->json('dones')->nullable();
            $table->json('problems')->nullable();
            $table->json('follow_up')->nullable();
            $table->json('todos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
