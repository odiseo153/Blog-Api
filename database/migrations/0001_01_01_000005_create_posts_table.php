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
        Schema::create('posts', function (Blueprint $table) {
            $table->ulid('id')->unique()->primary();
            $table->string('title')->unique();            
            $table->text('content'); // Changed to text for longer content
            $table->dateTime('publish_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('views_count')->default(0); // Changed to integer and added a default value
            $table->integer('like_count')->default(0); // Changed to integer and added a default value
            $table->timestamps();
            
            $table->ulid('user_id');
            $table->ulid('category_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
