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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('category'); // featured, best-seller, ice-cream, donut
            $table->string('image_path');
            $table->integer('rating')->nullable();
            $table->integer('review_count')->default(0);
            $table->string('badge')->nullable(); // top-rated, popular, favorite
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
