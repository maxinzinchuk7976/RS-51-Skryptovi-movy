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
        Schema::create('search', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->default("")->nullable();
            $table->string('brand', 64)->default("")->nullable();
            $table->string('material', 64)->default("")->nullable();
            $table->integer('mincost')->default(-1)->nullable();
            $table->integer('maxcost')->default(-1)->nullable();
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search');
    }
};
