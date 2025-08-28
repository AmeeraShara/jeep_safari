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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->constrained()->onDelete('cascade');
            $table->string('username');
            $table->string('email');
            $table->integer('rating');
            $table->string('visit_date');
            $table->string('companions');
            $table->string('title');
            $table->text('comment');
            $table->string('photos')->nullable();
            $table->boolean('agreement')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
